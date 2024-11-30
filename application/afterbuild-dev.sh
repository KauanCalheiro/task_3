#!/bin/bash

cd /var/www/html

chown -R www-data:www-data /var/www/html
chmod -R 777 /var/www/html

cp .env.example .env

composer install

php artisan key:generate

npm install

composer run dev