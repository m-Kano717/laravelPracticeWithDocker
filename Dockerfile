FROM php:8.2-apache

run apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_pgsql pgsql gd bcmath

run a2enmod rewrite

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

env APACHE_DOCUMENT_ROOT /var/www/html/public
run sed -ri 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
run sed -ri 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

workdir /var/www/html