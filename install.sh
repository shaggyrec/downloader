#!/usr/bin/env bash

composer install
npm run production
./createdb.sh

