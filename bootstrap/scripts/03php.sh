#!/bin/bash

# Installing PHP
sudo apt-get install php7.0 libapache2-mod-php php-mcrypt php-mysql php-cli
# Installing PHP Mod
sudo apt-get install libapache2-mod-php <<EOF
Y
EOF
# Installing Mysql for PHP (Wordpress)
sudo apt-get install php-mysql <<EOF
Y
EOF

# Installing XML for PHP (Bedrock)
sudo apt-get install php-xml <<EOF
Y
EOF

# Installing Zip for PHP (Bedrock)
apt-get install php-zip <<EOF
Y
EOF

# Installing MbString for PHP (Laravel)
sudo apt-get install php-mbstring <<EOF
Y
EOF




# Enabling
a2enmod php7.0
# Restart Apache2
systemctl restart apache2
systemctl status apache2
