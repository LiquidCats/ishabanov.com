FROM node:current-alpine as frontend

ADD . /app

WORKDIR /app

RUN npm install && npm run build

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

RUN apk add --no-cache nginx

ADD ./docker/production/app/config /etc/nginx/http.d
ADD . /app

WORKDIR /app

COPY --from=frontend ./app/public/static /app/public/static

RUN rm -rf /etc/nginx/http.d/default.conf

RUN chmod -R 0777 .

RUN composer install -q --no-ansi --no-interaction --no-scripts --no-progress --prefer-dist --no-dev

RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

EXPOSE 8000
EXPOSE 80

CMD nginx && php-fpm


