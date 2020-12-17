#!/bin/sh
cd /var/www
php artisan migrate:fresh --seed
/usr/bin/supervisord -n -c /etc/supervisord.conf
php-fpm
