FROM php:7.1-cli

RUN apt-get update && apt-get install -y \
    curl \
    libzip-dev \
    zip \
&& docker-php-ext-configure zip --with-libzip \
&& docker-php-ext-install \
    zip \
    pdo_mysql \
&& pecl install \
    xdebug-2.8.0beta1 \
&& docker-php-ext-enable \
    xdebug

COPY . /var/php
WORKDIR /var/php

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    composer update --prefer-dist --no-interaction

CMD ["./vendor/bin/simple-phpunit", "-v"]