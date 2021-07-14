FROM php:8.0-fpm

# CORY php.ini
COPY ./docker/app/php.ini /usr/local/etc/php/php.ini

# Composer install
COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

# install Node.js
COPY --from=node:10.22 /usr/local/bin /usr/local/bin
COPY --from=node:10.22 /usr/local/lib /usr/local/lib

#パッケージ管理ツールapt-getの更新と必要パッケージのインストール
RUN apt-get update \
    && apt-get install -y \
    git \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql bcmath

WORKDIR /var/www/html