#!/bin/bash

# Updating Linux
sudo apt-get update

URL=/vagrant/bootstrap/scripts/*.sh
for FILE in $URL; do
  if [ -f $FILE ] && [ -x $FILE ]; then
    $FILE $1
  fi
done

FRAMEWORK=$(sudo php /vagrant/bootstrap/sitehelper.php getframework)

if [ $FRAMEWORK="wordpress" ] | [ $FRAMEWORK="wp" ]
then
  sudo /vagrant/bootstrap/frameworks/wordpress.sh
elif [ $FRAMEWORK="laravel" ]
then
  sudo /vagrant/bootstrap/frameworks/laravel.sh
fi
