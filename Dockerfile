FROM php:5.6-apache
COPY ./www/ /var/www/html/
RUN docker-php-ext-install mysqli
RUN apt-get update && apt-get -y install git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer
