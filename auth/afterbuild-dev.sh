#!/bin/bash

cd /var/www/html

chown -R www-data:www-data /var/www/html
chmod -R 777 /var/www/html

composer install

cp .env.example .env

php artisan key:generate

apache2-foreground