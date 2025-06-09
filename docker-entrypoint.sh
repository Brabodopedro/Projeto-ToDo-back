#!/bin/bash

# Esperar MySQL ficar disponível
until nc -z db 3306; do
  echo "Aguardando MySQL..."
  sleep 2
done

# Adiciona uma pausa extra de segurança
sleep 5

composer install
php artisan key:generate

# tenta migrar até conseguir (máximo 10 tentativas)
for i in {1..10}; do
  php artisan migrate --seed && break || {
    echo "Tentativa $i falhou, aguardando..."
    sleep 3
  }
done

exec "$@"
