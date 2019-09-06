FROM php:7.3.8-fpm
RUN apt-get update && \
    apt-get install --no-install-recommends --assume-yes --quiet ca-certificates curl git zip libzip-dev zlib1g-dev && \
    apt-get install --no-install-recommends --assume-yes --quiet libxrender1 libfontconfig1 libx11-dev libjpeg62 libxtst6 &&\
    docker-php-ext-configure zip --with-libzip && \
    docker-php-ext-install zip mysqli pdo pdo_mysql opcache && \
    rm -rf /var/lib/apt/lists/*

RUN pecl install xdebug && \
    pecl install mongodb && \
    docker-php-ext-enable xdebug

RUN echo 'xdebug.remote_host=docker.for.mac.host.internal' >> /usr/local/etc/php/php.ini && \
    echo 'xdebug.remote_port=9002' >> /usr/local/etc/php/php.ini && \
    echo 'xdebug.remote_connect_back=0' >> /usr/local/etc/php/php.ini && \
    echo 'xdebug.idekey=PHPSTORM' >> /usr/local/etc/php/php.ini && \
    echo 'xdebug.default_enable=1' >> /usr/local/etc/php/php.ini && \
    echo 'xdebug.remote_enable=1' >> /usr/local/etc/php/php.ini && \
    echo 'xdebug.remote_autostart=1' >> /usr/local/etc/php/php.ini && \
    echo 'xdebug.remote_handler=dbgp' >> /usr/local/etc/php/php.ini && \
    echo 'xdebug.remote_log=/app/var/log/xdebug.log' >> /usr/local/etc/php/php.ini && \
    echo 'extension=mongodb.so' >> /usr/local/etc/php/php.ini && \
    echo 'memory_limit=-1' >> /usr/local/etc/php/php.ini && \
    echo 'date.timezone = "Europe/Warsaw"' >> /usr/local/etc/php/php.ini
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \
    mv composer.phar /usr/local/bin/composer
RUN ls -la /
#CMD composer config "platform.ext-mongo" "1.6.16" --working-dir=/app  -vvv&& \
#    composer require "alcaeus/mongo-php-adapter" --working-dir=/app -vvv
#CMD php bin/console doctrine:database:create  --if-not-exists  --no-interaction --quiet
#CMD /etc/init.d/php-fpm restart
WORKDIR /app