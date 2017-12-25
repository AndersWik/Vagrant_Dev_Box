#!/bin/bash

# Installing Laravel
cd /var/www/site/
composer global require "laravel/installer=~1.1"
composer create-project laravel/laravel laravel
