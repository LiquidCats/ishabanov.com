#!/usr/bin/env sh
set -e

### Deploy Reverse Proxy
cp deploy/production/proxy/* /etc/nginx/sites-enabled/*
nginx -s reload
service nginx restart

### Deploy Docker Stack
docker stack deploy -c docker-stack.yml onepager

###
