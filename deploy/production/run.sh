#!/usr/bin/env sh
set -e

docker compose -f docker-stack.yml build
docker stack deploy -c docker-stack.yaml onepager
