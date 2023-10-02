FROM php:7.4-fpm

WORKDIR /var/www/html

RUN apt-get update && \
    apt-get install libzip-dev -y && \
    docker-php-ext-install zip sockets bcmath

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer