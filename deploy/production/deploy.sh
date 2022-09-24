#!/usr/bin/env sh
set -e

### Deploy Docker Stack
docker stack deploy -c docker-stack.yml onepager --with-registry-auth

### Force Port Forwarding
docker service update onepager_app --publish-add 8000:80
