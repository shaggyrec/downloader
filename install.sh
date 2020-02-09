#!/usr/bin/env bash

DIR=$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )

composer install
npm run production
touch ${DIR}/database/db.sqlite
echo "DB_DATABASE=${DIR}/database/db.sqlite" >> .env
php artisan migrate
