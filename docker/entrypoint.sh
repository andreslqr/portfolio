#!/bin/sh
set -e

pnpm install --frozen-lockfile

# Docker Desktop can seed named volumes with empty .bin stubs (broken
# symlink copies from the image). Rebuild so package bins work again.
if [ ! -s node_modules/.bin/nuxt ]; then
  echo "Repairing broken node_modules/.bin..."
  pnpm rebuild
fi

exec "$@"
