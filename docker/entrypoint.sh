#!/bin/sh
set -e

cd /var/www/html

if [ ! -f .env ]; then
  cp .env.example .env
fi

if [ -z "$(grep '^APP_KEY=' .env | cut -d= -f2-)" ]; then
  php artisan key:generate --force
fi

composer install --no-interaction --prefer-dist --optimize-autoloader

php artisan migrate --force

exec "$@"
