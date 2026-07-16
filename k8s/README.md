# Infraestrutura Kubernetes — site-okbr

Deploy do site WordPress da OKFN Brasil no cluster Kubernetes **Revoada**
(CCSL/IME-USP), namespace `openknowledge`.

---

## Sumário

- [Arquitetura](#arquitetura)
- [Estrutura de arquivos](#estrutura-de-arquivos)
- [Ambientes](#ambientes)
- [CI/CD automático](#cicd-automático)
- [Operação manual](#operação-manual)
- [Secrets necessários](#secrets-necessários)
- [Migração do banco de dados](#migração-do-banco-de-dados)
- [Migração dos arquivos de mídia](#migração-dos-arquivos-de-mídia)
- [Escalar horizontalmente (futuro)](#escalar-horizontalmente-futuro)

---

## Arquitetura

```
Internet → Traefik (IngressRoute) → wordpress Deployment (1 pod)
                                         │
                          ┌──────────────┴──────────────┐
                          │                             │
                   PVC uploads (20Gi)         mariadb StatefulSet (1 pod)
                   ceph-block-hdd             PVC mariadb-data (10Gi)
                                              ceph-block-hdd
```

| Componente | Imagem | Notas |
|---|---|---|
| WordPress | `ghcr.io/okfn-brasil/site-okbr` | Tema + plugins no build |
| MariaDB | `mariadb:11` | StatefulSet single-node |
| TLS | cert-manager + Let's Encrypt | ClusterIssuer `letsencrypt-prod` |
| Ingress | Traefik v3 IngressRoute | Entry point `websecure` |

**Estratégia de deploy:** `Recreate` (necessária com PVC `ReadWriteOnce` — impede dois pods montarem o mesmo volume simultaneamente).

---

## Estrutura de arquivos

```
k8s/
├── base/                        # Manifestos canônicos compartilhados
│   ├── kustomization.yaml
│   ├── namespace.yaml           # namespace openknowledge
│   ├── configmap.yaml           # WORDPRESS_DB_HOST, WORDPRESS_DB_NAME
│   ├── secret.yaml              # TEMPLATE — nunca versionar valores reais
│   ├── ingressroute.yaml        # base HTTP com <DOMAIN_PLACEHOLDER>
│   ├── mariadb/
│   │   ├── statefulset.yaml     # MariaDB 11, PVC 10Gi
│   │   └── service.yaml         # headless (ClusterIP: None)
│   └── wordpress/
│       ├── deployment.yaml      # WordPress, strategy: Recreate
│       ├── pvc.yaml             # uploads, 20Gi ceph-block-hdd
│       └── service.yaml
├── overlays/
│   ├── production/              # versionado — sem dados sensíveis
│   │   ├── kustomization.yaml   # patches HTTPS, middlewares Traefik
│   │   └── certificate.yaml    # cert-manager, <DOMAIN_PLACEHOLDER>
│   ├── production-local/        # GITIGNORED — valores reais de produção
│   │   └── kustomization.yaml   # (usar production-local.example como base)
│   ├── production-local.example/ # template do production-local
│   │   └── kustomization.yaml
│   └── staging/                 # deploy automático por PR
│       ├── kustomization.yaml   # namePrefix: staging-, recursos menores
│       └── certificate.yaml    # cert-manager, staging.ok.org.br
```

---

## Ambientes

### Produção — `demo.ok.org.br`

| Item | Valor |
|---|---|
| Namespace | `openknowledge` |
| Domínio atual | `demo.ok.org.br` |
| WordPress Deployment | `wordpress` |
| MariaDB StatefulSet | `mariadb` |
| Secret | `wordpress-secret` |
| ConfigMap | `wordpress-config` |
| PVC uploads | `wordpress-uploads` (20Gi) |
| PVC banco | `mariadb-data-mariadb-0` (10Gi) |

### Staging — `staging.ok.org.br`

Sobe automaticamente a cada PR aberta. Usa `namePrefix: staging-`, então
todos os recursos têm o prefixo `staging-` e coexistem com produção no
mesmo namespace.

| Item | Valor |
|---|---|
| Domínio | `staging.ok.org.br` |
| WordPress Deployment | `staging-wordpress` |
| MariaDB StatefulSet | `staging-mariadb` |
| Secret | `staging-wordpress-secret` |
| ConfigMap | `staging-wordpress-config` |
| Recursos | Metade dos limites de produção |
| PVCs | 5Gi (banco) + 5Gi (uploads) |

---

## CI/CD automático

### Fluxo completo

```
Push de código
     │
     ▼
build (sempre)
  └─ docker build + push → ghcr.io/okfn-brasil/site-okbr:<sha> + :latest
     │
     ├─ Pull Request aberta/atualizada → deploy-staging
     │      VPN WireGuard → kubectl apply -k k8s/overlays/staging/
     │      Atualiza staging-wordpress-secret com valores reais
     │      Aguarda rollout (timeout 5min)
     │      Posta comentário na PR com URL do ambiente
     │
     └─ Push para main → deploy-production
            VPN WireGuard → kubectl apply -k k8s/overlays/production/
            Atualiza wordpress-secret com valores reais
            Aguarda rollout (timeout 5min)

PR fechada → staging-cleanup
     VPN WireGuard → kubectl delete -k k8s/overlays/staging/
     Posta comentário de teardown na PR
```

### Secrets e variáveis do GitHub

Configure nos ambientes **staging** e **production** em
`Settings → Environments` do repositório:

| Nome | Tipo | Descrição |
|---|---|---|
| `KUBECONFIG_REVOADA` | Secret | kubeconfig do cluster, codificado em **base64** |
| `WIREGUARD_CONFIG` | Secret | Conteúdo completo do `wg0.conf` (VPN Revoada) |
| `WORDPRESS_DB_PASSWORD` | Secret | Senha do usuário MariaDB do WordPress |
| `MARIADB_ROOT_PASSWORD` | Secret | Senha root do MariaDB |
| `WORDPRESS_AUTH_SALTS` | Secret | 8 linhas PHP geradas em https://api.wordpress.org/secret-key/1.1/salt/ |
| `WP_DOMAIN` | Variable | Domínio do ambiente (`staging.ok.org.br` / `demo.ok.org.br`) |
| `WORDPRESS_DB_USER` | Variable | Usuário do banco (`wordpress` ou equivalente) |

> O `KUBECONFIG_REVOADA` deve estar codificado em base64:
> ```bash
> cat ~/.kube/config | base64 -w0
> ```

---

## Operação manual

### Pré-requisitos

```bash
# Conectar à VPN Revoada
sudo wg-quick up wg0

# Verificar acesso ao cluster
kubectl get pods -n openknowledge
```

### Ver estado dos pods

```bash
kubectl get pods -n openknowledge
kubectl get pvc -n openknowledge
kubectl get ingress,ingressroute -n openknowledge
```

### Logs

```bash
# WordPress
kubectl logs -n openknowledge -l app=wordpress --tail=100 -f

# MariaDB
kubectl logs -n openknowledge -l app=mariadb --tail=100 -f

# Staging
kubectl logs -n openknowledge -l app=wordpress,environment=staging --tail=100 -f
```

### Reiniciar um deployment

```bash
kubectl rollout restart deployment/wordpress -n openknowledge
kubectl rollout restart deployment/staging-wordpress -n openknowledge
```

### Acessar o banco de dados

```bash
# Shell interativo no pod do MariaDB (produção)
kubectl exec -it statefulset/mariadb -n openknowledge -- \
  mariadb -u wordpress -p wordpress

# Staging
kubectl exec -it statefulset/staging-mariadb -n openknowledge -- \
  mariadb -u wordpress -p wordpress
```

### Deploy manual de produção

```bash
# 1. Preparar overlay local (primeira vez)
cp -r k8s/overlays/production-local.example k8s/overlays/production-local
# editar production-local/kustomization.yaml com domínio real

# 2. Ver diff antes de aplicar
kubectl diff -k k8s/overlays/production-local/

# 3. Aplicar
kubectl apply -k k8s/overlays/production-local/

# 4. Acompanhar rollout
kubectl rollout status deployment/wordpress -n openknowledge --timeout=5m
```

---

## Secrets necessários

Os secrets **nunca são versionados**. O `k8s/base/secret.yaml` é apenas um
template de estrutura. Em cada ambiente, o CI cria/atualiza o secret
automaticamente via `kubectl create secret --dry-run=client | kubectl apply`.

Para criar ou recriar manualmente:

```bash
# Produção
kubectl create secret generic wordpress-secret \
  -n openknowledge \
  --from-literal=WORDPRESS_DB_USER='<USUARIO>' \
  --from-literal=WORDPRESS_DB_PASSWORD='<SENHA_DB>' \
  --from-literal=MARIADB_ROOT_PASSWORD='<SENHA_ROOT>' \
  --from-literal=WORDPRESS_CONFIG_EXTRA="$(cat <<'EOF'
define('WP_HOME',    'https://ok.org.br');
define('WP_SITEURL', 'https://ok.org.br');
define('AUTH_KEY',         '<gerar em https://api.wordpress.org/secret-key/1.1/salt/>');
define('SECURE_AUTH_KEY',  '<VALOR>');
define('LOGGED_IN_KEY',    '<VALOR>');
define('NONCE_KEY',        '<VALOR>');
define('AUTH_SALT',        '<VALOR>');
define('SECURE_AUTH_SALT', '<VALOR>');
define('LOGGED_IN_SALT',   '<VALOR>');
define('NONCE_SALT',       '<VALOR>');
define('WP_MEMORY_LIMIT', '256M');
define('FORCE_SSL_ADMIN', true);
EOF
)" \
  --dry-run=client -o yaml | kubectl apply -f -
```

---

## Migração do banco de dados

Para migrar o banco MySQL/MariaDB existente (ex: hospedagem compartilhada,
VPS, cPanel) para o cluster Kubernetes.

### 1. Exportar o banco de origem

```bash
# Na máquina de origem (ou via SSH)
mysqldump \
  --host=<HOST_ORIGEM> \
  --user=<USUARIO_ORIGEM> \
  --password \
  --single-transaction \
  --routines \
  --triggers \
  --databases wordpress \
  > dump_wordpress_$(date +%Y%m%d).sql
```

> `--single-transaction` garante consistência sem bloquear tabelas no InnoDB.
> Remova se o banco tiver tabelas MyISAM.

### 2. Copiar o dump para o pod do MariaDB

```bash
# Conectar à VPN primeiro
sudo wg-quick up wg0

# Copiar o arquivo para dentro do pod
kubectl cp dump_wordpress_20260716.sql \
  openknowledge/mariadb-0:/tmp/dump.sql

# Verificar
kubectl exec -it statefulset/mariadb -n openknowledge -- \
  ls -lh /tmp/dump.sql
```

### 3. Importar no cluster

```bash
kubectl exec -it statefulset/mariadb -n openknowledge -- \
  bash -c "mariadb -u root -p\$MARIADB_ROOT_PASSWORD wordpress < /tmp/dump.sql"
```

> A variável `MARIADB_ROOT_PASSWORD` já está disponível no pod via secret.

### 4. Verificar a importação

```bash
kubectl exec -it statefulset/mariadb -n openknowledge -- \
  mariadb -u wordpress -p\$MARIADB_PASSWORD wordpress \
  -e "SHOW TABLES; SELECT COUNT(*) FROM wp_posts;"
```

### 5. Atualizar URLs no banco (se o domínio mudou)

Se o domínio de origem for diferente do domínio de destino (ex: migrar de
`antigo.ok.org.br` para `ok.org.br`), use o WP-CLI ou SQL direto:

```bash
kubectl exec -it statefulset/mariadb -n openknowledge -- \
  mariadb -u root -p\$MARIADB_ROOT_PASSWORD wordpress <<'SQL'
UPDATE wp_options
  SET option_value = REPLACE(option_value, 'https://antigo.ok.org.br', 'https://ok.org.br')
  WHERE option_name IN ('siteurl', 'home');

UPDATE wp_posts
  SET guid = REPLACE(guid, 'https://antigo.ok.org.br', 'https://ok.org.br');

UPDATE wp_posts
  SET post_content = REPLACE(post_content, 'https://antigo.ok.org.br', 'https://ok.org.br');

UPDATE wp_postmeta
  SET meta_value = REPLACE(meta_value, 'https://antigo.ok.org.br', 'https://ok.org.br')
  WHERE meta_value LIKE '%antigo.ok.org.br%';
SQL
```

> Para migrações complexas (serialized data), use o plugin
> [Better Search Replace](https://br.wordpress.org/plugins/better-search-replace/)
> ou o script PHP
> [Search Replace DB](https://github.com/interconnectit/Search-Replace-DB).

### 6. Limpar o dump temporário

```bash
kubectl exec -it statefulset/mariadb -n openknowledge -- rm /tmp/dump.sql
```

---

## Migração dos arquivos de mídia

O diretório `wp-content/uploads/` fica num PVC `ceph-block-hdd` de 20Gi
montado em `/var/www/html/wp-content/uploads` dentro do pod WordPress.

### 1. Compactar uploads na origem

```bash
# Na máquina de origem (ou via SSH/cPanel)
tar -czf uploads_$(date +%Y%m%d).tar.gz wp-content/uploads/
```

### 2. Copiar para o pod WordPress

```bash
# Conectar à VPN primeiro
sudo wg-quick up wg0

# Obter o nome do pod atual
WP_POD=$(kubectl get pod -n openknowledge -l app=wordpress -o jsonpath='{.items[0].metadata.name}')

# Copiar o arquivo
kubectl cp uploads_20260716.tar.gz openknowledge/$WP_POD:/tmp/uploads.tar.gz
```

### 3. Extrair dentro do pod

```bash
kubectl exec -it -n openknowledge $WP_POD -- \
  bash -c "
    cd /var/www/html/wp-content/uploads && \
    tar -xzf /tmp/uploads.tar.gz --strip-components=2 && \
    chown -R www-data:www-data /var/www/html/wp-content/uploads
  "
```

> `--strip-components=2` remove o prefixo `wp-content/uploads/` do tar,
> extraindo diretamente no diretório correto. Ajuste conforme a estrutura
> do seu tar (verifique com `tar -tzf uploads.tar.gz | head`).

### 4. Verificar

```bash
kubectl exec -it -n openknowledge $WP_POD -- \
  find /var/www/html/wp-content/uploads -type f | wc -l
```

### 5. Limpar arquivo temporário

```bash
kubectl exec -it -n openknowledge $WP_POD -- rm /tmp/uploads.tar.gz
```

### Alternativa via rsync (para volumes grandes)

Para uploads muito grandes (>5Gi), é mais eficiente usar `kubectl port-forward`
com rsync via SSH:

```bash
# Terminal 1 — port-forward para o pod WordPress
kubectl port-forward -n openknowledge pod/$WP_POD 2222:22

# Terminal 2 — rsync direto (requer SSH habilitado no pod, não padrão)
rsync -avz --progress \
  /caminho/local/uploads/ \
  root@localhost:2222:/var/www/html/wp-content/uploads/
```

> A imagem `wordpress:6.7-php8.2-apache` não tem SSH. Para uploads grandes,
> prefira o `kubectl cp` em partes ou considere montar o PVC num pod auxiliar
> com `rsync` instalado.

### Alternativa via pod auxiliar (uploads muito grandes)

```bash
# Cria um pod temporário montando o mesmo PVC
kubectl run upload-helper \
  --image=alpine \
  --restart=Never \
  --overrides='{"spec":{"volumes":[{"name":"uploads","persistentVolumeClaim":{"claimName":"wordpress-uploads"}}],"containers":[{"name":"upload-helper","image":"alpine","command":["sleep","3600"],"volumeMounts":[{"name":"uploads","mountPath":"/uploads"}]}]}}' \
  -n openknowledge

# Copiar para o pod auxiliar
kubectl cp uploads_20260716.tar.gz openknowledge/upload-helper:/tmp/uploads.tar.gz

# Extrair
kubectl exec -it -n openknowledge upload-helper -- \
  tar -xzf /tmp/uploads.tar.gz -C /uploads --strip-components=2

# Remover pod auxiliar
kubectl delete pod upload-helper -n openknowledge
```

---

## Escalar horizontalmente (futuro)

A configuração atual usa 1 réplica com PVC `ReadWriteOnce`. Para escalar:

1. **Uploads**: migrar para S3/Ceph Object Storage via plugin
   [WP Offload Media](https://wordpress.org/plugins/amazon-s3-and-cloudfront/)
   — elimina a dependência do PVC de uploads.
2. **PVC do banco**: o MariaDB single-node não escala horizontalmente com
   esta configuração. Para HA, considerar Galera Cluster ou migrar para o
   CloudNativePG (PostgreSQL) com plugin de compatibilidade.
3. **Strategy**: mudar de `Recreate` para `RollingUpdate` assim que o
   volume de uploads for removido (passo 1 concluído).
