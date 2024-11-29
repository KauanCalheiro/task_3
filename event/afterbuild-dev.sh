#!/bin/bash

cd /usr/src/app

chown -R www-data:www-data /usr/src/app
chmod -R 777 /usr/src/app

npm install

npm run dev