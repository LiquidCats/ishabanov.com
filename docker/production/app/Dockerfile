FROM node:latest-alpine as frontend

ADD . /app

WORKDIR /app

RUN npm install && npm run build

FROM iliashabanov/php:latest

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


