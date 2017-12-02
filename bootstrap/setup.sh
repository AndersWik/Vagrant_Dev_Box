#!/bin/bash
# Updating Linux
sudo apt-get update
sudo apt-get install -y apache2
# Installing Apache2
sudo ufw allow in "Apache Full"
# Installing SQL
export DEBIAN_FRONTEND="noninteractive"
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password password root"
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password_again password root"

sudo apt-get install mysql-server <<EOF
Y
EOF
# Securing mysql for Dev
mysql_secure_installation <<EOF
root
n
n
Y
Y
Y
Y
EOF
# Installing Php
sudo apt-get install php7.0 libapache2-mod-php php-mcrypt php-mysql php-cli
# Restart Apache2
systemctl restart apache2
systemctl status apache2
# What is Vagrant Ip
ifconfig
