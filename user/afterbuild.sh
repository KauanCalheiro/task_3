#!/bin/bash

cd /var/www/html

chown -R www-data:www-data /var/www/html
chmod -R 777 /var/www/html

cp .env.example .env

apache2-foreground
