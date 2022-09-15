FROM iliashabanov/php:latest

RUN apk add --no-cache nginx

ADD ./docker/production/app/config /etc/nginx/conf.d
ADD . /app

WORKDIR /app

RUN composer install -q --no-ansi --no-interaction --no-scripts --no-progress --prefer-dist --no-dev

RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache


