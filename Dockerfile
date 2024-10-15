FROM php:8.3-apache

### PHP

# we may need some other php modules, but we can first check the enabled modules with
# docker run -it --rm php:8.3-apache php -m
# RUN docker-php-ext-install mbstring 

### Apache

# change the document root to /var/www/html/public
RUN sed -i -e "s/html/html/public/g" /etc/apache2/sites-enabled/000-default.conf

# enable apache mod_rewrite
RUN a2enmod rewrite

### Laravel application

# copy source files
COPY . /var/www/html

# these directories need to be writable by Apache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# copy env file for our Docker image
COPY env.docker /var/www/html/.env

RUN php artisan config:cache

# only if you do NOT use anonymous functions in your routes:
RUN php artisan route:cache

### Docker image metadata

VOLUME ["/var/www/html/storage", "/var/www/html/bootstrap/cache"]