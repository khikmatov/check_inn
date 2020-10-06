FROM composer:latest AS composer

FROM php:7.3-fpm

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        git \
        zip \
        unzip \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

RUN apt-get install -y \
        jpegoptim \
        pngquant \
        optipng \
        gifsicle

RUN \
  export DEBIAN_FRONTEND=noninteractive \
  && echo "en_US.UTF-8 UTF-8" > /etc/locale.gen \
  && echo "ru_RU.UTF-8 UTF-8" >> /etc/locale.gen \
  && apt-get install -y locales \
  && update-locale LANG=en_US.UTF-8

RUN docker-php-ext-install -j$(nproc) mysqli pdo_mysql exif bcmath sockets

RUN pecl install mongodb && docker-php-ext-enable mongodb

#####################################
# ImageMagick:
#####################################
RUN apt-get install -y libmagickwand-dev imagemagick && pecl install imagick && docker-php-ext-enable imagick

COPY .docker/php-fpm/laravel.ini /usr/local/etc/php/conf.d
COPY .docker/php-fpm/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN usermod -u 1000 www-data
WORKDIR /var/www

ENV COMPOSER_ALLOW_SUPERUSER=1

#####################################
# xDebug:
#####################################
ARG INSTALL_XDEBUG=false

RUN if [ ${INSTALL_XDEBUG} = true ]; then \
    pecl install xdebug && docker-php-ext-enable xdebug \
    ;fi

EXPOSE 9000
