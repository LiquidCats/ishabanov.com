#!/usr/bin/env sh
set -e

### Deploy Docker Stack
docker stack deploy -c docker-stack.yml onepager
