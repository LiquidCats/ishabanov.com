FROM node:current-alpine as frontend

WORKDIR /app

ADD . /app

RUN npm install --no-fund --silent
RUN npm run build

FROM composer:latest as backend

WORKDIR /app

ADD . /app

RUN composer install --no-interaction --optimize-autoloader --ignore-platform-reqs --no-dev

FROM webdevops/php-nginx:8.2-alpine

WORKDIR /app

ENV WEB_DOCUMENT_ROOT=/app/public
ENV PHP_DISMOD=bz2,calendar,exiif,ffi,intl,gettext,ldap,mysqli,imap,soap,sockets,sysvmsg,sysvsm,sysvshm,shmop,xsl,zip,gd,apcu,vips,yaml,imagick,mongodb,amqp

COPY --from=backend /app /app
COPY --from=frontend /app/public/static /app/public/static

RUN chown -R application:application .
