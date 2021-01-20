FROM node:15.5.1-alpine3.12 as node

FROM php:7.4.14-fpm-alpine3.12

WORKDIR /var/www/

# node
COPY --from=node /usr/local/bin/node /usr/local/bin/node
# npm
COPY --from=node /usr/local/lib/node_modules/ /usr/local/lib/node_modules
# composer
COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

# 依存関係 + 設定ファイル
COPY ./composer.* /var/www/
COPY ./php/php.ini /var/www/php.ini
COPY ./package.json /var/www/package.json

# リンク
RUN set -eux \
    && ln -s /usr/local/bin/node /usr/local/bin/nodejs \
    && ln -s /usr/local/lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npm \
    && ln -s /usr/local/lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npx

# node 系 + xdebug 用に必要なパッケージ
RUN set -eux \
    && apk add --update-cache --no-cache \
    g++ \
    libstdc++ \
    libgcc \
    autoconf \
    make \
    libzip-dev

# php 拡張 + git
RUN set -eux \
    && docker-php-ext-install \
    opcache \
    pdo_mysql \
    zip \
    # git \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-configure opcache --enable-opcache

# セットアップ
RUN set -eux \
    && composer install \
    && composer dump-autoload