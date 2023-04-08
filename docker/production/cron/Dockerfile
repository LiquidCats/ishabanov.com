FROM php:8.2-cli-alpine

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Install Laravel framework system requirements
RUN apk add --no-cache  $PHPIZE_DEPS postgresql-dev

# Install PHP extensions
RUN docker-php-ext-install pdo_pgsql bcmath

# Install Redis Exstention
RUN pecl install redis
RUN docker-php-ext-enable redis.so

RUN apk del $PHPIZE_DEPS

ADD ./docker/production/cron/config/crontab /var/spool/cron/crontabs/root
ADD . /app

WORKDIR /app

RUN composer install -q --no-ansi --no-interaction --no-scripts --no-progress --prefer-dist --no-dev

RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

CMD php-fpm -D && crond -f -c /var/spool/cron/crontabs


