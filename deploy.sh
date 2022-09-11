#!/usr/bin/env sh
set -e

### Deploy Reverse Proxy
cp deploy/production/proxy/* /etc/nginx/sites-enabled/*
nginx -s reload
service nginx restart

### Setup Rules
chmod -R 644 .
chmod -R ug+rwx storage
chmod -R ug+rwx bootstrap/cache

### Deploy Docker Stack
docker stack deploy -c docker-stack.yml onepager
