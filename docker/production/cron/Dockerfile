FROM r.liquid-cats.com/onepager/php:latest

ADD ./docker/production/app/config/crontab /var/spool/cron/crontabs/root
ADD . /app

WORKDIR /app

RUN composer install -q --no-ansi --no-interaction --no-scripts --no-progress --prefer-dist

RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

CMD crond -f


