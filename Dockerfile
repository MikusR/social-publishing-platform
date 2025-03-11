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
    && docker-php-ext-install pdo pdo_sqlite \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy Laravel app code to the container
COPY . .

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Create SQLite database directory and file with proper permissions
RUN mkdir -p /var/www/database \
    && touch /var/www/database/database.sqlite \
    && chown -R www-data:www-data /var/www \
    && find /var/www/storage -type d -exec chmod 775 {} \; \
    && find /var/www/storage -type f -exec chmod 664 {} \; \
    && chmod -R 775 /var/www/bootstrap/cache /var/www/database

# Expose PHP-FPM port
EXPOSE 9000

# Simple command to run migrations and start PHP-FPM
CMD php artisan migrate --force && php-fpm
