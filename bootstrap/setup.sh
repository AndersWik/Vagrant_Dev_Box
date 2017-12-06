#!/bin/bash

# Updating Linux
sudo apt-get update

URL=/vagrant/bootstrap/scripts/*.sh
for FILE in $URL; do
  if [ -f $FILE ] && [ -x $FILE ]; then
    $FILE
  fi
done
