# Vagrant Dev Box

Vagrant configuration for development using Ubuntu Xenial64.

## Installing

* Apache2
* Mysql
* PHP

## Options

### Site name (-s)

Add server name and alias for the virtual host.
The default value is "site.dev".

Example: ./vagrantex.sh -s mysite.dev

### Framework (-f)

Install a framework in public html.
The default value is "none".

* Wordpress (wordpress | wp)

Example: ./vagrantex.sh -f wordpress

### Run (-r)

Run does not take any arguments. If this flag is set
"vagrant run --provision" will run when the other options
are set.

### Help (-h)

Help does not take any arguments. It will display the help menu.
