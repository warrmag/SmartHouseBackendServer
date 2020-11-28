###> @todo move to released image once published
FROM php:8.0.0RC5-fpm

RUN echo "deb http://us.archive.ubuntu.com/ubuntu/ precise main universe" >> /etc/apt/source.list
RUN apt-get update && \
    apt-get install --no-install-recommends --assume-yes --quiet ca-certificates curl git zip libzip-dev zlib1g-dev cron \
    acl vim htop lnav supervisor rsyslog sudo && \
    apt-get install --no-install-recommends --assume-yes --quiet libxrender1 libfontconfig1 libx11-dev libjpeg62 libxtst6 libpq-dev python  && \
    docker-php-ext-configure zip && \
    docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && \
    docker-php-ext-install zip mysqli pdo pdo_mysql pdo_pgsql opcache bcmath && \
    rm -rf /var/lib/apt/lists/*

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \
    mv composer.phar /usr/local/bin/composer

###> Add application user to manage inside
RUN adduser --disabled-password --gecos "" app
RUN usermod -aG sudo,1000 app && echo "app ALL=(ALL) NOPASSWD: ALL" >> /etc/sudoers

RUN mkdir -p /.composer/cache
RUN chown app:1000 -R /.composer/cache

###> syslogger agent
RUN echo "catch_workers_output = yes" >> /usr/local/etc/php-fpm.d/www.conf
RUN sed -i 's/error_log = \/proc\/self\/fd\/2/error_log = \/proc\/1\/fd\/2/g' /usr/local/etc/php-fpm.d/docker.conf || true
RUN sed -i 's/access.log = \/proc\/self\/fd\/2/access.log = \/proc\/1\/fd\/2/g' /usr/local/etc/php-fpm.d/docker.conf || true

RUN pecl install xdebug && \
    mkdir /conf.d && \
    docker-php-ext-enable xdebug

###> Copy application config and required scripts
COPY docker/php/php.dev.ini /usr/local/etc/php/php.ini
COPY docker/php/supervisord.conf /etc/supervisord.conf

COPY ./api /app
COPY ./docker/php/entrypoint.sh /entrypoint.sh

ENV PHP_INI_RECOMMENDED="/usr/local/etc/php/php.${APP}.ini"
RUN ln -sf "${PHP_INI_RECOMMENDED}" "${PHP_INI_DIR}/php.ini"

RUN mkdir -p /api/var/log
RUN sudo chown app:1000 -R /app

WORKDIR /app
USER app

ENTRYPOINT ["/entrypoint.sh"]

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
