# site-okbr

Tema WordPress do site institucional da [OKFN Brasil](https://ok.org.br).

---

## Estrutura do repositório

```
site-okbr/
├── acf-json/        # campos ACF versionados
├── assets/          # CSS, JS, imagens do tema
├── include/         # funções auxiliares PHP
├── plugins/         # plugins incluídos no build Docker
├── *.php            # templates do tema WordPress
├── Dockerfile       # imagem para deploy em Kubernetes
├── .dockerignore
├── .github/
│   └── workflows/
│       ├── build-push.yml      # CI/CD principal (build + deploy)
│       └── staging-cleanup.yml # teardown do ambiente de staging
└── k8s/             # infraestrutura Kubernetes
    ├── README.md    # documentação completa de infra, operação e migração
    ├── base/        # manifestos base (compartilhados entre overlays)
    └── overlays/
        ├── production/          # overlay de produção (versionado)
        ├── production-local/    # GITIGNORED — valores reais de produção
        ├── production-local.example/  # template para o production-local
        └── staging/             # overlay de staging (deploy por PR)
```

---

## Desenvolvimento local do tema

O tema pode ser desenvolvido localmente apontando para qualquer instalação
WordPress. O banco de dados e os uploads não são versionados.

Para editar templates PHP, CSS e JS, basta clonar o repositório e
configurar o WordPress local para carregar este diretório como tema ativo.

---

## Deploy e infraestrutura

O site roda em **Kubernetes** no cluster Revoada (CCSL/IME-USP), com CI/CD
automático via GitHub Actions:

- **Push para `main`** → deploy em produção (`demo.ok.org.br`)
- **Pull Request aberta** → ambiente de staging (`staging.ok.org.br`)
- **PR fechada** → staging removido automaticamente

Consulte [`k8s/README.md`](k8s/README.md) para:
- Arquitetura detalhada
- Como operar os deployments manualmente
- Como configurar os secrets necessários
- Como migrar o banco de dados e os arquivos de mídia

---

## Imagem Docker

A imagem empacota o tema e os plugins no build:

```dockerfile
FROM wordpress:6.7-php8.2-apache
COPY plugins/ /var/www/html/wp-content/plugins/
COPY . /var/www/html/wp-content/themes/site-okbr/
```

Publicada em: `ghcr.io/okfn-brasil/site-okbr`

Build local:
```bash
docker build -t ghcr.io/okfn-brasil/site-okbr:local .
```
