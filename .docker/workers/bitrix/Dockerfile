FROM php:7.3-cli

RUN apt-get update && apt-get install -y \
        git \
        zip \
        unzip

RUN docker-php-ext-install -j$(nproc) exif bcmath sockets

RUN docker-php-ext-install -j$(nproc) mysqli pdo_mysql exif bcmath sockets

RUN pecl install mongodb && docker-php-ext-enable mongodb

COPY .docker/php-fpm/laravel.ini /usr/local/etc/php/conf.d

WORKDIR /var/www

CMD php artisan worker:bitrix
