FROM php:8.1-fpm-alpine

# Install Laravel framework system requirements
RUN apk --update --no-cache add postgresql-dev \
                                oniguruma-dev \
                                curl \
                                git \
                                grep \
                                build-base \
                                libmemcached-dev \
                                libmcrypt-dev \
                                libxml2-dev \
                                imagemagick-dev \
                                pcre-dev \
                                libtool \
                                make \
                                autoconf \
                                g++ \
                                cyrus-sasl-dev \
                                libgsasl-dev

RUN docker-php-ext-install bcmath \
                           ctype \
                           fileinfo \
                           mbstring \
                           pdo_mysql \
                           pdo_pgsql \
                           xml

# Copy existing application directory contents
COPY . /app
COPY ./docker/production/app/config/crontab /var/spool/cron/crontabs/root

# Set working directory
WORKDIR /app

RUN chmod -R 777 .

# Create the log file to be able to run tail
RUN touch /var/log/cron.log
