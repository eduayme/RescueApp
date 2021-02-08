FROM php:7.3-apache

COPY ./ /var/www

# Change default document root
ENV APACHE_DOCUMENT_ROOT /var/www/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN apt-get update && \
    apt-get install -y libzip-dev && \
    docker-php-ext-configure zip && \
    docker-php-ext-install -j$(nproc) zip && \
    docker-php-ext-configure pdo_mysql && \
    docker-php-ext-install -j$(nproc) pdo_mysql && \
    curl -s https://raw.githubusercontent.com/composer/getcomposer.org/fa8ea54c9ba4dc3b13111fb4707f9c3b2d4681f6/web/installer | php -- --quiet && \
    mv composer.phar /usr/local/bin/composer && \
    cd /var/www && \
    rm -f /var/www/.env && \
    rm -rf /var/www/vendor && \
    composer update --no-scripts && \
    a2enmod rewrite && \
    rm -rf /var/lib/apt/lists/*

WORKDIR "/var/www"
