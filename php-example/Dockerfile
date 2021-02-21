FROM php:7.0-apache
WORKDIR /var/www/html
RUN docker-php-ext-install mysqli \
    && docker-php-ext-install tokenizer \
    && docker-php-ext-install opcache \
    && docker-php-ext-install pdo \
    && docker-php-ext-install pdo_mysql 
COPY ./app .