FROM php:8.4-fpm

# Install system dependencies including Node.js
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    libpq-dev \
    nodejs \
    npm

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy existing application directory contents
COPY . /var/www/html

# Create and set permissions for all necessary directories
RUN mkdir -p /var/www/html/storage/framework/{sessions,views,cache,testing} \
    && mkdir -p /var/www/html/storage/logs \
    && mkdir -p /var/www/html/bootstrap/cache \
    && chown -R www-data:www-data /var/www/html/storage \
    && chown -R www-data:www-data /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache \
    && touch /var/www/html/storage/logs/laravel.log \
    && chmod 664 /var/www/html/storage/logs/laravel.log

# Fix npm cache directory permissions
RUN mkdir -p /var/www/.npm \
    && chown -R www-data:www-data /var/www/.npm \
    && chmod 775 /var/www/.npm

# Configure npm to use the cache directory
RUN npm config set cache /var/www/.npm

# Install Node dependencies and build assets (run as root, but safe during build)
RUN npm install && npm run build

EXPOSE 9000

CMD ["php-fpm"]