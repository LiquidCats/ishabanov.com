#!/usr/bin/env bash
set -e

chown $USER:www-data -R .

find . -type f -exec chmod 644 {} \;
find . -type d -exec chmod 755 {} \;

rm /var/www/www.liquid-cats.com
ln -s $(pwd) /var/www/www.liquid-cats.com
