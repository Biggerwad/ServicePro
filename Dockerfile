# Use official PHP image with Apache
FROM php:8.2-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Copy source files
COPY . /var/www/html/

# Copy app files into Apache root directory
COPY public/ /var/www/html/

# Enable Apache mod_rewrite (optional)
RUN a2enmod rewrite

# Set permissions (optional)
RUN chown -R www-data:www-data /var/www/html

# Expose the default Apache port
EXPOSE 80