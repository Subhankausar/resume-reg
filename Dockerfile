
# Use official PHP image with Apache
FROM php:8.2-apache

# Copy all files to Apache's root directory
COPY . /var/www/html/

# Enable Apache mod_rewrite (optional, for clean URLs)
RUN a2enmod rewrite

# Set permissions (optional)
RUN chown -R www-data:www-data /var/www/html

# Expose port 80
EXPOSE 80
