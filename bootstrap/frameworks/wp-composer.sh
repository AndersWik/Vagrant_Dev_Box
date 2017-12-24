#!/bin/bash

# Installing Wordpress with Composer
cd /var/www/site
composer create-project roots/bedrock

ENVTO=/var/www/site/bedrock/.env
ENV=$(sudo php /vagrant/bootstrap/sitehelper.php getenv)
sudo tee $ENVTO <<< "$ENV"

mysql -u root -proot <<EOF
CREATE DATABASE IF NOT EXISTS wordpress;
CREATE USER IF NOT EXISTS 'wordpress'@'localhost' IDENTIFIED BY 'wordpress';
GRANT ALL PRIVILEGES ON wordpress.* TO 'wordpress'@'localhost';
FLUSH PRIVILEGES;
EXIT
EOF

SITECONFTO=/etc/apache2/sites-available/site.dev.conf
SITECONF=$(sudo php /vagrant/bootstrap/sitehelper.php getsiteconf)
sudo tee $SITECONFTO <<< "$SITECONF"

sudo service apache2 restart
