#!/usr/bin/env bash
# Configura secrets e variáveis dos ambientes GitHub Actions para o site-okbr.
#
# Uso:
#   ./scripts/setup-github-environments.sh                  # ambos os ambientes
#   ./scripts/setup-github-environments.sh --env staging    # só staging
#   ./scripts/setup-github-environments.sh --env production # só produção
#
# Pré-requisitos:
#   gh auth login   (com scopes: repo, workflow)
#
# Os valores podem ser passados como variáveis de ambiente (útil para scripts
# não-interativos) ou digitados interativamente quando não fornecidos.
#
# Exemplo não-interativo:
#   KUBECONFIG_FILE=~/.kube/revoada.yaml \
#   WG_CONFIG_FILE=~/wg0.conf \
#   STAGING_DB_PASSWORD=senha123 \
#   STAGING_DB_USER=wp_staging \
#   STAGING_ROOT_PASSWORD=root123 \
#   STAGING_DOMAIN=staging.ok.org.br \
#   PROD_DB_PASSWORD=senha456 \
#   PROD_DB_USER=wp_prod \
#   PROD_ROOT_PASSWORD=root456 \
#   PROD_DOMAIN=ok.org.br \
#   ./scripts/setup-github-environments.sh

set -euo pipefail

REPO="okfn-brasil/site-okbr"
ENVS=("staging" "production")

# ── Parsing de argumentos ────────────────────────────────────────────────────

while [[ $# -gt 0 ]]; do
  case "$1" in
    --env)
      ENVS=("$2"); shift 2 ;;
    --repo)
      REPO="$2"; shift 2 ;;
    *) echo "Opção desconhecida: $1"; exit 1 ;;
  esac
done

# ── Funções utilitárias ──────────────────────────────────────────────────────

log()  { echo "▶ $*"; }
ok()   { echo "  ✓ $*"; }

# Lê um valor: primeiro tenta a variável de env, depois prompt interativo.
# $1 = nome da variável de env
# $2 = mensagem do prompt
# $3 = se "secret", oculta a entrada
read_value() {
  local envvar="$1" prompt="$2" mode="${3:-plain}"
  if [[ -n "${!envvar:-}" ]]; then
    echo "${!envvar}"
    return
  fi
  if [[ "$mode" == "secret" ]]; then
    read -rsp "  $prompt: " val; echo >&2; echo "$val"
  else
    read -rp  "  $prompt: " val; echo "$val"
  fi
}

set_secret() {
  local env="$1" name="$2" value="$3"
  printf '%s' "$value" | gh secret set "$name" --env "$env" --repo "$REPO" --body -
  ok "secret $name → $env"
}

set_variable() {
  local env="$1" name="$2" value="$3"
  gh variable set "$name" --env "$env" --repo "$REPO" --body "$value"
  ok "variable $name=$value → $env"
}

# ── Verificações iniciais ────────────────────────────────────────────────────

if ! gh auth status &>/dev/null; then
  echo "Erro: gh não está autenticado. Execute: gh auth login"
  exit 1
fi

log "Repositório: $REPO"
log "Ambientes: ${ENVS[*]}"
echo

# ── Secrets compartilhados (mesmo valor em todos os ambientes) ───────────────

log "Coletando secrets compartilhados entre ambientes..."

# kubeconfig — lê de arquivo se KUBECONFIG_FILE estiver definido
if [[ -n "${KUBECONFIG_FILE:-}" ]]; then
  KUBECONFIG_B64=$(base64 -w0 < "$KUBECONFIG_FILE")
else
  echo "  Informe o caminho para o kubeconfig do Revoada (ou deixe em branco para digitar base64):"
  read -rp "  Arquivo [ex: ~/.kube/revoada.yaml]: " kc_file
  if [[ -n "$kc_file" ]]; then
    KUBECONFIG_B64=$(base64 -w0 < "${kc_file/#\~/$HOME}")
  else
    KUBECONFIG_B64=$(read_value KUBECONFIG_B64 "kubeconfig em base64" secret)
  fi
fi

# WireGuard config — lê de arquivo se WG_CONFIG_FILE estiver definido
if [[ -n "${WG_CONFIG_FILE:-}" ]]; then
  WG_CONFIG=$(cat "$WG_CONFIG_FILE")
else
  echo "  Informe o caminho para o arquivo wg0.conf (ou deixe em branco para colar o conteúdo):"
  read -rp "  Arquivo [ex: /etc/wireguard/wg0.conf]: " wg_file
  if [[ -n "$wg_file" ]]; then
    WG_CONFIG=$(cat "${wg_file/#\~/$HOME}")
  else
    echo "  Cole o conteúdo do wg0.conf (finalize com Ctrl+D):"
    WG_CONFIG=$(cat)
  fi
fi

echo

# ── Coleta de valores por ambiente ───────────────────────────────────────────

declare -A DB_USER DB_PASSWORD ROOT_PASSWORD DOMAIN AUTH_SALTS

for env in "${ENVS[@]}"; do
  log "Coletando valores para o ambiente: $env"

  if [[ "$env" == "staging" ]]; then
    DB_USER[$env]=$(read_value STAGING_DB_USER    "WORDPRESS_DB_USER  [$env]")
    DB_PASSWORD[$env]=$(read_value STAGING_DB_PASSWORD "WORDPRESS_DB_PASSWORD [$env]" secret)
    ROOT_PASSWORD[$env]=$(read_value STAGING_ROOT_PASSWORD "MARIADB_ROOT_PASSWORD [$env]" secret)
    DOMAIN[$env]=$(read_value STAGING_DOMAIN "WP_DOMAIN [$env, ex: staging.ok.org.br]")
  else
    DB_USER[$env]=$(read_value PROD_DB_USER    "WORDPRESS_DB_USER  [$env]")
    DB_PASSWORD[$env]=$(read_value PROD_DB_PASSWORD "WORDPRESS_DB_PASSWORD [$env]" secret)
    ROOT_PASSWORD[$env]=$(read_value PROD_ROOT_PASSWORD "MARIADB_ROOT_PASSWORD [$env]" secret)
    DOMAIN[$env]=$(read_value PROD_DOMAIN "WP_DOMAIN [$env, ex: ok.org.br]")
  fi

  echo "  Gere as auth salts em: https://api.wordpress.org/secret-key/1.1/salt/"
  echo "  Cole as 8 linhas PHP abaixo (finalize com Ctrl+D):"
  AUTH_SALTS[$env]=$(cat)
  echo
done

# ── Aplicar no GitHub ────────────────────────────────────────────────────────

log "Configurando secrets e variáveis no GitHub..."
echo

for env in "${ENVS[@]}"; do
  log "Ambiente: $env"

  # Secrets compartilhados
  set_secret "$env" "KUBECONFIG_REVOADA"    "$KUBECONFIG_B64"
  set_secret "$env" "WIREGUARD_CONFIG"      "$WG_CONFIG"

  # Secrets específicos do ambiente
  set_secret "$env" "WORDPRESS_DB_PASSWORD" "${DB_PASSWORD[$env]}"
  set_secret "$env" "MARIADB_ROOT_PASSWORD" "${ROOT_PASSWORD[$env]}"
  set_secret "$env" "WORDPRESS_AUTH_SALTS"  "${AUTH_SALTS[$env]}"

  # Variáveis (não-sensíveis)
  set_variable "$env" "WP_DOMAIN"          "${DOMAIN[$env]}"
  set_variable "$env" "WORDPRESS_DB_USER"  "${DB_USER[$env]}"

  echo
done

log "Concluído. Todos os secrets e variáveis configurados para: ${ENVS[*]}"
