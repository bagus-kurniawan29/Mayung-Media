FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    libicu-dev \
    git \
    curl \
    nodejs \
    npm

# Enable PHP extensions
RUN docker-php-ext-install intl zip pdo pdo_mysql

# Enable Apache rewrite
RUN a2enmod rewrite

WORKDIR /var/www/html

COPY . .

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN composer install --no-dev --optimize-autoloader
RUN npm install && npm run build

RUN php artisan key:generate || true
RUN php artisan storage:link || true

RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 80
