FROM php:8.1-fpm-alpine

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Install Laravel framework system requirements
RUN apk add --no-cache  $PHPIZE_DEPS \
                        postgresql-dev \
                        oniguruma-dev \
                        curl \
                        git \
                        grep \
                        build-base \
                        libmemcached-dev \
                        libmcrypt-dev \
                        libxml2-dev \
                        imagemagick-dev \
                        pcre-dev \
                        libtool \
                        make \
                        autoconf \
                        g++ \
                        cyrus-sasl-dev \
                        libgsasl-dev

RUN pecl install redis

RUN docker-php-ext-install bcmath \
                           ctype \
                           fileinfo \
                           mbstring \
                           pdo_pgsql \
                           xml

RUN docker-php-ext-enable redis.so
