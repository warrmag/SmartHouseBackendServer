#!/bin/bash
docker exec -it app-php composer config "platform.ext-mongo" "1.6.16" --working-dir=/app
docker exec -it app-php composer require "alcaeus/mongo-php-adapter" --working-dir=/app
docker exec -it app-php composer update
docker exec -it app-php php bin/console doctrine:database:create  --if-not-exists  --no-interaction
docker exec -it app-php php bin/console doctrine:migrations:migrate --no-interaction --allow-no-migration
