#!/bin/bash

set -e  # Faz o script parar se qualquer comando falhar

echo "🔄 Aguardando MySQL..."
until nc -z db 3306; do
  sleep 2
done

echo "✅ MySQL disponível, iniciando setup..."
sleep 3

# Garantir que dependências estão instaladas
if [ ! -d "vendor" ]; then
  composer install
fi

# Garante que a key só é gerada uma vez
if [ ! -f .env ]; then
  cp .env.example .env
fi

php artisan key:generate || true

# Executar migrações com seed, ignorando erro se já existir
for i in {1..10}; do
  if php artisan migrate --seed; then
    echo "✅ Migração completa."
    break
  else
    echo "⚠️ Tentativa $i falhou, aguardando..."
    sleep 3
  fi
done

# Rodar o CMD do Dockerfile
exec "$@"
