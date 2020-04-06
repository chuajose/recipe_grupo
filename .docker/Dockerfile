FROM php:7.2.3-apache

MAINTAINER Jose Suarez

COPY vhost.conf /etc/apache2/sites-available/000-default.conf
# COPY .docker/vhost-ssl.conf /etc/apache2/sites-available/default-ssl.conf
# COPY .docker/ssl/server.key /ect/apache2/ssl/server.key
# COPY .docker/ssl/server.crt /ect/apache2/ssl/server.crt

WORKDIR /srv/app
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng-dev \
    git \

&& docker-php-ext-install -j$(nproc) mbstring pdo pdo_mysql mysqli zip\
&& docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
&& docker-php-ext-install -j$(nproc) gd \
&& docker-php-ext-configure bcmath --enable-bcmath \
&& docker-php-ext-install -j$(nproc) bcmath \
&& chown -R www-data:www-data /srv/app \
&& a2enmod rewrite \
&& a2enmod ssl

