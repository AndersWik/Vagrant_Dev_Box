#!/bin/bash

function helpMenu {
  echo "
  PROGRAM MENU
  -s -site      Define site name ex: site.dev
  -f -framework Add framework to public html
                * Wordpress (wordpress | wp)
                * Wordpress Bedrock (wordpress-composer | wp-composer)
  -h -help      Show help menu"
}

RUN="-1"

while getopts ":f:s:hr" opt; do
  case $opt in
    s)
      php bootstrap/sitehelper.php setdomain ${OPTARG}
      php bootstrap/sitehelper.php sethost ${OPTARG}
      ;;
    f)
      php bootstrap/sitehelper.php setframework ${OPTARG}
      ;;
    r)
      RUN="0"
      ;;
    h)
      helpMenu
      ;;
  esac
done

if [ "$RUN" -eq "0" ]; then
  vagrant up --provision
fi
