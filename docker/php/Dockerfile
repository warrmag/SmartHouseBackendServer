FROM php:7.4.2-fpm

ARG USER_ID=1000
ARG GROUP_ID=1000

RUN userdel -f www-data &&\
    if getent group www-data ; then groupdel www-data; fi &&\
    groupadd -g ${GROUP_ID} www-data &&\
    useradd -l -u ${USER_ID} -g www-data www-data &&\
    install -d -m 0755 -o www-data -g www-data /home/www-data

RUN apt-get update && \
    apt-get install --no-install-recommends --assume-yes --quiet ca-certificates curl git zip libzip-dev zlib1g-dev sudo && \
    apt-get install --no-install-recommends --assume-yes --quiet libxrender1 libfontconfig1 libx11-dev libjpeg62 libxtst6 libpq-dev  && \
    docker-php-ext-configure zip && \
    docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && \
    docker-php-ext-install zip mysqli pdo pdo_mysql pdo_pgsql opcache && \
    rm -rf /var/lib/apt/lists/*

RUN usermod -aG sudo www-data && echo "www-data ALL=(ALL) NOPASSWD: ALL" >> /etc/sudoers

COPY . .

RUN pecl install xdebug && \
    pecl install mongodb && \
    docker-php-ext-enable xdebug

RUN echo 'xdebug.remote_host=docker.for.mac.host.internal' >> /usr/local/etc/php/php.ini && \
    echo 'xdebug.remote_port=9002' >> /usr/local/etc/php/php.ini && \
    echo 'xdebug.remote_connect_back=0' >> /usr/local/etc/php/php.ini && \
    echo 'xdebug.idekey=PHPSTORM' >> /usr/local/etc/php/php.ini && \
    echo 'xdebug.remote_handler=dbgp' >> /usr/local/etc/php/php.ini && \
    echo 'xdebug.remote_log=/app/var/log/xdebug.log' >> /usr/local/etc/php/php.ini && \
    echo 'extension=mongodb.so' >> /usr/local/etc/php/php.ini && \
    echo 'memory_limit=-1' >> /usr/local/etc/php/php.ini && \
    echo 'date.timezone = "Europe/Warsaw"' >> /usr/local/etc/php/php.ini
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \
    mv composer.phar /usr/local/bin/composer

RUN composer global require hirak/prestissimo --prefer-dist

COPY entrypoint.sh /entrypoint.sh
RUN chmod 777 /entrypoint.sh

WORKDIR /app

RUN sudo chown -R www-data:www-data /app

USER www-data

ENTRYPOINT ["/entrypoint.sh"]

CMD ["php-fpm"]
