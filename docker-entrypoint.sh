#!/bin/bash
# Gerar chave do app
if ! grep -q "^APP_KEY=base64" .env; then
  php artisan key:generate
fi

# Gerar JWT_SECRET corretamente
php artisan jwt:secret --force

# Cache atualizado
php artisan config:clear
php artisan config:cache

# Migração e seed
for i in {1..10}; do
  if php artisan migrate --seed; then
    echo "✅ Migração completa."
    break
  else
    echo "⚠️ Tentativa $i falhou, aguardando..."
    sleep 3
  fi
done

# Iniciar Laravel (deve ser a última linha executável)
php artisan serve --host=0.0.0.0 --port=8000
