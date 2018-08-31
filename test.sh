#!/bin/sh

set -e

cd api
./bin/phpunit

cd ../admin
php ../api/bin/console server:start
CI=true yarn test
php ../api/bin/console server:stop