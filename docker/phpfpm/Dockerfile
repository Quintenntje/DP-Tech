FROM bitnami/php-fpm:latest


RUN install_packages curl unzip git

RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer \


RUN composer require doctrine/migrations
RUN composer require doctrine/orm
