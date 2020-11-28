#!/bin/sh

composer install --no-interaction --optimize-autoloader --working-dir=/app

sudo grep -qxF 'xdebug.remote_autostart=1' /usr/local/etc/php/php.ini || echo 'xdebug.remote_autostart=1' >> /usr/local/etc/php/php.ini
sudo grep -qxF 'xdebug.default_enable=1' /usr/local/etc/php/php.ini || echo 'xdebug.default_enable=1' >> /usr/local/etc/php/php.ini
sudo grep -qxF 'xdebug.remote_enable=1' /usr/local/etc/php/php.ini || echo 'xdebug.remote_enable=1' >> /usr/local/etc/php/php.ini

# orm is required
# php bin/console doctrine:database:create  --if-not-exists  --no-interaction
# php bin/console doctrine:migrations:migrate --no-interaction --allow-no-migration
# php bin/console doctrine:fixtures:load --no-interaction

exec "$@"
