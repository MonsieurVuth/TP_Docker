FROM php:5.6-apache
COPY ./www/ /var/www/html/
RUN docker-php-ext-install mysqli
RUN apt-get update && apt-get -y install -y \ 
git \
curl \
RUN curl -sS https://getcomposer.org/download/1.7.2/composer.phar -o /usr/local/bin/composer \
&& chmod +x /usr/local/bin/composer
