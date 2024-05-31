FROM php:8.2-fpm

MAINTAINER  A. Colomiiciuc <antonc.coder@gmail.com>

RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    libicu-dev \
    nano \
    procps

RUN docker-php-ext-install -j$(nproc) pdo_mysql \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

COPY local.ini /usr/local/etc/php/conf.d/local.ini

WORKDIR /var/www

EXPOSE 9000

CMD ["php-fpm"]
