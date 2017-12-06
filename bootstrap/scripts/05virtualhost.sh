#!/bin/bash

# Virtualhost
FROM=/vagrant/bootstrap/templates/site.dev.conf
TO=/etc/apache2/sites-available/site.dev.conf

sudo cp -v $FROM $TO

sudo a2ensite site.dev.conf
sudo service apache2 restart

FROM=/vagrant/bootstrap/templates/dir.conf
TO=/etc/apache2/mods-enabled/dir.conf

sudo cp -v $FROM $TO

sudo systemctl restart apache2
