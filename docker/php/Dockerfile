ARG PHP_VERSION=8.0.6

# Dev image
FROM php:${PHP_VERSION}-fpm-alpine AS base

## Install php extensions
RUN docker-php-ext-install pdo_mysql

# Use the default development configuration
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

WORKDIR /app

## Install composer
RUN wget https://getcomposer.org/installer && \
    php installer --install-dir=/usr/local/bin/ --filename=composer && \
    rm installer

FROM base AS aws

WORKDIR /app
## Copy project files to workdir
COPY . .

RUN mv .env.docker .env
# Use the default production configuration
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

ENV APP_ENV=prod
## Install application dependencies
RUN composer install --no-dev --no-interaction --optimize-autoloader

## Change files owner to php-fpm default user
RUN chown -R www-data:www-data .

VOLUME /app