#!/usr/bin/env bash

DIR=$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )

touch ${DIR}/database/db.sqlite
echo "DB_DATABASE=${DIR}/database/db.sqlite" >> .env
php artisan migrate --no-interaction -vvv
