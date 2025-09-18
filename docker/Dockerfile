FROM php:8.1-apache

# Cài extension PHP cần thiết
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Bật mod_rewrite
RUN a2enmod rewrite

# Copy cấu hình Apache
COPY vhost.conf /etc/apache2/sites-available/000-default.conf

# Thiết lập thư mục làm việc
WORKDIR /var/www/html
COPY ./public /var/www/html
COPY ./app /var/www/html/app
COPY ./data /var/www/html/data

# Phân quyền
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
