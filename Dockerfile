# Use the official PHP image with Apache
FROM php:8.1-apache

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    libonig-dev \
    curl \
    libxml2-dev \
    git \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install Composer globally
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Copy the Laravel project (from the 'catalogo' directory to the container)
COPY catalogo /var/www/html

# Set permissions for Laravel (ensure Apache has access to storage and cache)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Install Composer dependencies
RUN composer install --no-dev --optimize-autoloader

# Expose port 80
EXPOSE 80

# Copy custom Apache config to the container (this assumes 000-default.conf is in the same directory as your Dockerfile)
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Start the Apache server
CMD ["apache2-foreground"]
