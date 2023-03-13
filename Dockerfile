FROM php:8.0.11-apache

RUN apt-get update && \
    apt-get install -y libzip-dev libpq-dev && \
    docker-php-ext-install pdo pdo_mysql pdo_pgsql zip && \
    a2enmod rewrite



COPY . /var/www/html
COPY .htaccess /var/www/html/public/

RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 775 /var/www/html
RUN chmod -R 777 storage/ bootstrap/
RUN php artisan config:cache && \
    php artisan route:cache

EXPOSE 80
