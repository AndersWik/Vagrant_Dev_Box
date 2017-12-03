#!/bin/bash

# Installing Php
sudo apt-get install php7.0 libapache2-mod-php php-mcrypt php-mysql php-cli
# Restart Apache2
systemctl restart apache2
systemctl status apache2
