#!/bin/bash

# Virtualhost
SITECONFTO=/etc/apache2/sites-available/site.dev.conf
SITECONF=$(sudo php /vagrant/bootstrap/sitehelper.php getsiteconf)
sudo tee $SITECONFTO <<< "$SITECONF"

sudo a2ensite site.dev.conf
sudo service apache2 restart

DIRCONFTO=/etc/apache2/mods-enabled/dir.conf
DIRCONF=$(sudo php /vagrant/bootstrap/sitehelper.php getdirconf)
sudo tee $DIRCONFTO <<< "$DIRCONF"

sudo systemctl restart apache2

INDEXTO=/var/www/site/public_html/index.php
INDEX=$(sudo php /vagrant/bootstrap/sitehelper.php getindex)
sudo tee $INDEXTO <<< "$INDEX"
