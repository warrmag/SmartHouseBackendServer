#!/bin/sh

mkdir -p vendor
chown www-data:ww-data .env
chown -R www-data:ww-data var
#in case of mongo just uncomment
#composer config "platform.ext-mongo" "1.6.16" --working-dir=/app
#composer require "alcaeus/mongo-php-adapter" --working-dir=/app

composer install --no-interaction --optimize-autoloader --working-dir=/app

sudo grep -qxF 'xdebug.remote_autostart=1' /usr/local/etc/php/php.ini || echo 'xdebug.remote_autostart=1' >> /usr/local/etc/php/php.ini
sudo grep -qxF 'xdebug.default_enable=1' /usr/local/etc/php/php.ini || echo 'xdebug.default_enable=1' >> /usr/local/etc/php/php.ini
sudo grep -qxF 'xdebug.remote_enable=1' /usr/local/etc/php/php.ini || echo 'xdebug.remote_enable=1' >> /usr/local/etc/php/php.ini

php bin/console doctrine:database:create  --if-not-exists  --no-interaction
php bin/console doctrine:migrations:migrate --no-interaction --allow-no-migration
php bin/console doctrine:fixtures:load --no-interaction

exec "$@"
