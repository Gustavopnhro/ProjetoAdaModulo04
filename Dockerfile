FROM php:7.4-apache
COPY . /var/www/html
RUN docker-php-ext-install mysqli && \
    apt-get update && \
    apt-get install -y libpq-dev && \
    rm -rf /var/lib/apt/lists/*

RUN a2enmod rewrite
