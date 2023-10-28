FROM php:alpine

WORKDIR /app

RUN apk add --no-cache libpq-dev
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-install pgsql pdo_pgsql

ADD . .

EXPOSE 8000

CMD php ./artisan serve --host=0.0.0.0
