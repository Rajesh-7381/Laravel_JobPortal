# Use an official PHP runtime as a parent image
FROM php:8.2.4-fpm

# Set the working directory to /app
WORKDIR /app

# Copy composer.lock and composer.json to install dependencies
COPY composer.lock composer.json /app/

# Install any needed packages specified in the dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install --no-scripts

# Copy the rest of the application code
COPY . /app/

# Set up Laravel
RUN php artisan key:generate

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
