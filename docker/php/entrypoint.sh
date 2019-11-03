#!/bin/sh
composer config "platform.ext-mongo" "1.6.16" --working-dir=/app -vv
composer require "alcaeus/mongo-php-adapter" --working-dir=/app -vv
composer update --working-dir=/app -vvv

php bin/console doctrine:database:create  --if-not-exists  --no-interaction
php bin/console doctrine:migrations:migrate --no-interaction --allow-no-migration
php bin/console doctrine:fixtures:load --no-interaction

chown 1000:1000 -R /app/var/dev

exec "$@"