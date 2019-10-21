#!/bin/sh

composer config "platform.ext-mongo" "1.6.16" --working-dir=/app
composer require "alcaeus/mongo-php-adapter" --working-dir=/app
composer update
php bin/console doctrine:database:create  --if-not-exists  --no-interaction
php bin/console doctrine:migrations:migrate --no-interaction --allow-no-migration

exec "$@"