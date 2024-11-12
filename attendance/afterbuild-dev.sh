#!/bin/bash

cd /app

chown -R www-data:www-data /app
chmod -R 777 /app

npm install

npm run dev