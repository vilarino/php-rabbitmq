FROM php:8.2-fpm

WORKDIR /var/www/html

RUN apt-get update && \
    apt-get install libzip-dev -y && \
    docker-php-ext-install zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer