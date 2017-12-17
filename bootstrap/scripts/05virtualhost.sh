#!/bin/bash

# Virtualhost
FROM=/vagrant/bootstrap/templates/site.dev.conf
TO=/etc/apache2/sites-available/site.dev.conf

if [ -n "$1" ]; then
 sudo sed "s/site.dev/$1/g" $FROM > $TO
else
 sudo cp -v $FROM $TO
fi

sudo a2ensite site.dev.conf
sudo service apache2 restart

FROM=/vagrant/bootstrap/templates/dir.conf
TO=/etc/apache2/mods-enabled/dir.conf

sudo cp -v $FROM $TO

sudo systemctl restart apache2

if [ -n "$1" ]; then
 FROM=/vagrant/bootstrap/templates/index.php
 TO=/var/www/site/public_html/index.php
 sudo sed "s/site.dev/$1/g" $FROM > $TO
fi
