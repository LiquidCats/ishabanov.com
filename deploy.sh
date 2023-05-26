#!/usr/bin/env bash
set -e

chown $USER:www-data -R .

chmod 755 -R .

rm /var/www/www.liquid-cats.com
ln -s $(pwd) /var/www/www.liquid-cats.com
