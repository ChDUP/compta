FROM php:7-fpm

RUN apt-get update
RUN apt-get install -y unzip libicu-dev libxml2-dev zlib1g-dev nodejs

RUN pecl install -o -f xdebug-2.7.0
RUN echo "zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20170718/xdebug.so" > /usr/local/etc/php/conf.d/xdebug.ini;

RUN docker-php-ext-install pdo pdo_mysql mysqli mbstring intl soap

WORKDIR /webapp
