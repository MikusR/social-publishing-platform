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

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Create SQLite database directory if not exists
RUN mkdir -p /var/www/database

# Ensure SQLite database file exists with proper permissions
RUN touch /var/www/database/database.sqlite

# Set proper permissions for Laravel
RUN chown -R www-data:www-data /var/www && \
    find /var/www/storage -type d -exec chmod 775 {} \; && \
    find /var/www/storage -type f -exec chmod 664 {} \; && \
    chmod -R 775 /var/www/bootstrap/cache && \
    chmod -R 775 /var/www/database

# Expose PHP-FPM port
EXPOSE 9000

# Create a proper entrypoint script
RUN echo '#!/bin/sh' > /usr/local/bin/entrypoint.sh && \
    echo 'set -e' >> /usr/local/bin/entrypoint.sh && \
    echo 'chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache /var/www/database' >> /usr/local/bin/entrypoint.sh && \
    echo 'chmod -R 775 /var/www/storage /var/www/bootstrap/cache' >> /usr/local/bin/entrypoint.sh && \
    echo 'chmod 664 /var/www/database/database.sqlite || true' >> /usr/local/bin/entrypoint.sh && \
    echo 'php artisan migrate --force' >> /usr/local/bin/entrypoint.sh && \
    echo 'php-fpm' >> /usr/local/bin/entrypoint.sh && \
    chmod +x /usr/local/bin/entrypoint.sh

# Run Laravel migrations and start PHP-FPM
CMD ["/usr/local/bin/entrypoint.sh"]
