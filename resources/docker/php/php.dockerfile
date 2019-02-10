FROM php:7-fpm

RUN apt-get clean && apt-get -yqq update

RUN apt-get install -y unzip libicu-dev libxml2-dev zlib1g-dev gnupg locales

RUN sed -i 's/# en_US.UTF-8 UTF-8/en_US.UTF-8 UTF-8/g' /etc/locale.gen
RUN sed -i 's/# fr_FR.UTF-8 UTF-8/fr_FR.UTF-8 UTF-8/g' /etc/locale.gen

RUN locale-gen fr_FR.UTF-8
RUN locale-gen en_US.UTF-8

ENV LANG='fr_FR.UTF-8' LANGUAGE='fr_FR.UTF-8' LC_ALL='fr_FR.UTF-8'

RUN docker-php-ext-install pdo pdo_mysql mysqli mbstring intl soap

RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

RUN curl -sL https://deb.nodesource.com/setup_10.x | bash - && apt-get install -y nodejs

WORKDIR /webapp
