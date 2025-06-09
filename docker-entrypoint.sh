#!/bin/bash

set -e

echo "🔄 Aguardando MySQL..."
until nc -z db 3306; do
  sleep 2
done

echo "✅ MySQL disponível, iniciando setup..."
sleep 3

# Garante que o .env existe antes de qualquer comando do Laravel
if [ ! -f .env ]; then
  cp .env.example .env
fi

# Instalar dependências, se necessário
if [ ! -d "vendor" ]; then
  composer install
fi

# Limpar cache de configuração (boa prática para Docker)
php artisan config:clear
php artisan config:cache

# Gerar key apenas se não existir no .env
if ! grep -q "^APP_KEY=base64" .env; then
  php artisan key:generate
fi

# Tenta migrar com seed até funcionar
for i in {1..10}; do
  if php artisan migrate --seed; then
    echo "✅ Migração completa."
    break
  else
    echo "⚠️ Tentativa $i falhou, aguardando..."
    sleep 3
  fi
done

# Executa o comando padrão do container
exec "$@"
