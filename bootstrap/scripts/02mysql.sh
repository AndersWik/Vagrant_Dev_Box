#!/bin/bash

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
