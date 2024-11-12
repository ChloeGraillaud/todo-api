
FROM php:8.1-apache

RUN docker-php-ext-install pdo pdo_mysql

COPY ./public /var/www/html/

COPY ./.htaccess /var/www/html/.htaccess

EXPOSE 80

CMD ["apache2-foreground"]
