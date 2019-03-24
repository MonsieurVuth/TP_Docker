FROM php:5.6-apache
RUN mkdir minio2
RUN docker-php-ext-install mysqli
RUN apt-get update 
RUN apt-get install -y  git 
RUN apt-get install -y curl 
RUN apt-get install -y zip 
RUN apt-get install -y unzip
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer
COPY ./www /var/www/html
RUN chmod 777 -R  /var/www/html/uploads 
RUN composer require aws/aws-sdk-php
