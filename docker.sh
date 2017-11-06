#!/bin/bash

# Installation from https://getcomposer.org/download/
# Installation de composer en local
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"

export APP_NAME=Laravel
export APP_ENV=local
export APP_KEY=''
export APP_DEBUG=true
export APP_LOG_LEVEL=debug
export APP_URL=http://localhost

export DB_CONNECTION=mysql
export DB_HOST=127.0.0.1
export DB_PORT=3306
export DB_DATABASE=homestead
export DB_USERNAME=homestead
export DB_PASSWORD=secret

export BROADCAST_DRIVER=log
export CACHE_DRIVER=file
export SESSION_DRIVER=file
export QUEUE_DRIVER=sync

export REDIS_HOST=127.0.0.1
export REDIS_PASSWORD=null
export REDIS_PORT=6379

export MAIL_DRIVER=smtp
export MAIL_HOST=smtp.mailtrap.io
export MAIL_PORT=2525
export MAIL_USERNAME=null
export MAIL_PASSWORD=null
export MAIL_ENCRYPTION=null

export PUSHER_APP_ID=''
export PUSHER_APP_KEY=''
export PUSHER_APP_SECRET=''

apt-get update
apt-get install -y unzip 
DEBIAN_FRONTEND=noninteractive apt-get -y install mysql-server
php composer.phar install
mysqld &
