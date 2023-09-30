FROM php:8.0-apache
COPY . /var/www/html

RUN a2enmod rewrite

RUN apt-get update \
    && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

COPY db/tocodump.sql /docker-entrypoint-initdb.d/
