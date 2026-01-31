FROM php:8.2-apache

# Enable Apache rewrite (optional, but handy if you add routing later)
RUN a2enmod rewrite

# Copy app into Apache web root
COPY public/ /var/www/html/

# Make sure Apache can write session files (normally ok in this image)
RUN chown -R www-data:www-data /var/www/html
