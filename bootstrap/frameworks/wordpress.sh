#!/bin/bash

# Installing Wordpress
cd /var/www/site/
wget https://wordpress.org/latest.tar.gz
tar -xzvf latest.tar.gz
rm latest.tar.gz
cp /vagrant/bootstrap/templates/wordpress/wp-config.php /var/www/site/wordpress/wp-config.php

#TIMESTAMP=`date "+%Y%m%d-%H%M%S"`
#mysqldump -u root -proot wordpress > "/var/www/site/wordpress-$TIMESTAMP.sql"

mysql -u root -proot <<EOF
CREATE DATABASE IF NOT EXISTS wordpress;
CREATE USER IF NOT EXISTS 'wordpress'@'localhost' IDENTIFIED BY 'wordpress';
GRANT ALL PRIVILEGES ON wordpress.* TO 'wordpress'@'localhost';
FLUSH PRIVILEGES;
EXIT
EOF

# Temporary permissions
sudo chgrp www-data /var/www
sudo chmod -R 775 /var/www
sudo chmod -R g+s /var/www
