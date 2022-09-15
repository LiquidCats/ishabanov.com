FROM iliashabanov/php:latest

ADD ./docker/production/cron/config/crontab /var/spool/cron/crontabs/root
ADD . /app

WORKDIR /app

RUN composer install -q --no-ansi --no-interaction --no-scripts --no-progress --prefer-dist --no-dev

RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

RUN crond -b -c /var/spool/cron/crontabs


