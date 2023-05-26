#!/usr/bin/env bash
set -e

sudo chown $USER:www-data -R .

sudo chmod 775 -R .

php artisan config:cache
php artisan event:cache
php artisan route:cache
php artisan view:cache

rm /var/www/www.liquid-cats.com
ln -s $(pwd) /var/www/www.liquid-cats.com
