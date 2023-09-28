FROM php:8.0-apache
COPY . /var/www/html

# FROM postgres:latest
COPY ./scripts/toco.sql /docker-entrypoint-initdb.d/
COPY ./scripts/init.sql /docker-entrypoint-initdb.d/
