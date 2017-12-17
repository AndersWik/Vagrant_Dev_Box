#!/bin/bash

selection=$1

function helpMenu {
  echo "
  PROGRAM MENU
  -s -site   Define site name ex: site.dev
  -h -help   Show help menu"
}

if [ "$selection" = "-s" ] || [ "$selection" = "-site" ]; then
    DEV_SITE=$2 vagrant up --provision
elif [ "$selection" = "-h" ] || [ "$selection" = "-help" ]; then
    helpMenu
else
    helpMenu
fi
