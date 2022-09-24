#!/usr/bin/env sh
set -e

### Deploy Docker Stack
docker stack deploy -c docker-stack.yml onepager --quiet --detach --with-registry-auth --prune

### Force Port Forwarding
docker service update onepager_app --quiet --detach --publish-add 8000:80
