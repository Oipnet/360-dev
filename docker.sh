#!/bin/bash

# Installation from https://getcomposer.org/download/
# Installation de composer en local
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"

apt-get update
apt-get install -y unzip 

# Installation nodejs et npm à faire
# Installation des dépendances npm
# LIer le localhost au container
php composer.phar install
php composer.phar

# From stackoverflow https://stackoverflow.com/questions/7739645/install-mysql-on-ubuntu-without-password-prompt
# debconf-set-selections <<< 'mysql-server mysql-server/root_password password grootmyfriend'
# debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password grootmyfriend'
# apt-get -y install mysql-server

# Lancement mysql et creation des tables
#sudo DEBIAN_FRONTEND=noninteractive apt-get install -y mysql-server
service mysql start
mysql -h127.0.0.1 -P3306 -uroot -e "UPDATE mysql.user SET password = PASSWORD('groot') WHERE user = 'root'"
mysql -uroot -pgroot -e "CREATE DATABASE homestead;"
