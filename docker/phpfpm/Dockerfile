FROM php:8.4-fpm


RUN APT GET update && \
    apt-get install -y \
    git \
    curl \
    zip \
    unzip \

WORKDIR /var/www/