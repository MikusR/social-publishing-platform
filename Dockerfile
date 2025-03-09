# Use official PHP-FPM image
FROM php:8.4.1-fpm

# Set working directory inside container
WORKDIR /var/www

# Install system dependencies and required PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libsqlite3-dev \
    sqlite3 \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_sqlite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy Laravel app code to the container
COPY . .

# Set permissions for Laravel
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
RUN chmod -R 777 /var/www/storage /var/www/bootstrap/cache /var/www/database

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Ensure SQLite database file exists
RUN touch database/database.sqlite && chmod -R 777 database

# Expose PHP-FPM port
EXPOSE 9000

# Run Laravel migrations and start PHP-FPM
CMD php artisan migrate --force && php-fpm
