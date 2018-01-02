# Vagrant PHP Box

Vagrant configuration for php development. Vagrant box with `Ubuntu Xenial64`. The following applications will be installed on the guest machine.

* Apache2
* Mysql
* PHP
* Composer

## Prerequisite

* Git installed
* Vagrant installed

## Installation

To install the script clone down the project from github.

``` php
git clone https://github.com/AndersWik/Vagrant_Dev_Box.git
```

To create new boxes we can clone down a new project every time or in the `Vagrant_Dev_Box` folder type,

``` bash
sudo ./install.sh
```

This will add a `devboxphp` script to `/usr/local/bin/`. Then the script can be called from anywhere. To clone down new instances of the project after that type,

``` bash
devboxphp
```

The script will `git clone` down a new `Vagrant_Dev_Box` project. An optional `-d` option can be set to define what folder the project will be cloned to.

``` bash
devboxphp -d mydevbox
```

## Usage

To initialize a local site with the domain `dev.test` and with `wordpress` installed type:

``` php
$ ./devbox -f wordpress -s dev.test -r
```

For the moment the ip needs to be added to the host file manually. SSH in to the guest machine and run ifconfig.

``` php
$ vagrant ssh
$ ifconfig
```
Copy the ip and add it with the domain to the host machines host file.

``` php
$ sudo nano /etc/hosts
```

## Compatibility

Tested on macOS High Sierra.

## Options

Options are the settings that can be set to change the scripts behavior. The options can be set in any order.

### Site name (-s)

Add server name and alias for the virtual host.
The default value is `site.dev`.

Example:
``` php
./devbox -s mysite.dev
```

### Framework (-f)

Install a framework in public html. By default no framework is installed.

* Wordpress (wordpress | wp)
* Wordpress with Composer (wordpress-composer | wp-composer)
* Laravel (laravel)

Example:

``` php
$ ./devbox -f wordpress
```

### Run (-r)

Run does not take any arguments. If this flag is set
`vagrant run --provision` will run when the other options
are set.

### Help (-h)

Help does not take any arguments. It will display the help menu.

## Extending

All bash scripts in `/bootstrap/scripts` will run on `vagrant provision`. Add additional scripts to be run on creation of the box here.
