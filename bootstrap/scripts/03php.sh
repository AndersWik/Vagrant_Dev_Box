#!/bin/bash

# Installing PHP
sudo apt-get install php7.0 libapache2-mod-php php-mcrypt php-mysql php-cli
# Installing PHP Mod
sudo apt-get install libapache2-mod-php <<EOF
Y
EOF
# Enabling
a2enmod php7.0
# Restart Apache2
systemctl restart apache2
systemctl status apache2
