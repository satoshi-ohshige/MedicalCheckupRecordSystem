FROM php:8.3-fpm-bookworm

WORKDIR /work

COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

RUN apt-get update \
  && apt-get install -y --no-install-recommends \
    git \
    libicu-dev \
    libonig-dev \
    libzip-dev \
    unzip \
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/* \
  && echo 'Asia/Tokyo' > /etc/timezone \
  && cp /usr/share/zoneinfo/Asia/Tokyo /etc/localtime \
  && pecl install xdebug \
  && docker-php-ext-install \
    bcmath \
    pdo_mysql

COPY ./docker/php/php.ini /usr/local/etc/php/php.ini
