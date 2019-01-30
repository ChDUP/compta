FROM php:7-fpm

RUN apt-get -yqq update
RUN apt-get install -y unzip libicu-dev libxml2-dev zlib1g-dev gnupg

RUN docker-php-ext-install pdo pdo_mysql mysqli mbstring intl soap

RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

RUN curl -sL https://deb.nodesource.com/setup_10.x | bash - && apt-get install -y nodejs

WORKDIR /webapp
