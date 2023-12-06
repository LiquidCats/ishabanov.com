FROM php:alpine

WORKDIR /app

RUN apk add --no-cache libpq-dev pcre-dev $PHPIZE_DEPS
RUN pecl install redis  \
    && docker-php-ext-enable redis.so
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-install pgsql pdo_pgsql

ADD . .

EXPOSE 8000

CMD php ./artisan -vvv serve --host=0.0.0.0
