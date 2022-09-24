#!/usr/bin/env bash
set -e

### Deploy Docker Stack
docker stack deploy -c docker-stack.yml onepager --with-registry-auth

### Force Port Forwarding
docker service update onepager_app --quiet --detach --publish-add 8000:80
