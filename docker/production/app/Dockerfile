FROM iliashabanov/php:latest

ADD ./docker/production/server/config /etc/nginx/conf.d
ADD . /app

WORKDIR /app

RUN apk add --no-cache nginx
RUN composer install -q --no-ansi --no-interaction --no-scripts --no-progress --prefer-dist

RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache


