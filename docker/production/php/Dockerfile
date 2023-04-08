FROM php:8.2-fpm-alpine

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Install Laravel framework system requirements
RUN apk add --no-cache  $PHPIZE_DEPS postgresql-dev

# Install PHP extensions
RUN docker-php-ext-install pdo_pgsql bcmath

# Install Redis Exstention
RUN pecl install redis
RUN docker-php-ext-enable redis.so

RUN apk del $PHPIZE_DEPS
