#!/bin/bash
composer install --no-interaction --optimize-autoloader --prefer-dist --no-scripts --no-dev
php artisan migrate --env=local
php artisan serve --env=local --host=0.0.0.0 --port=9000