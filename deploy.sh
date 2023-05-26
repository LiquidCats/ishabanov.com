#!/usr/bin/env bash
set -e

sudo chown $USER:www-data -R .

sudo chmod 775 -R .

rm /var/www/www.liquid-cats.com
ln -s $(pwd) /var/www/www.liquid-cats.com
