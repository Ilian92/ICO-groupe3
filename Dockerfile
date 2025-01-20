FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    && docker-php-ext-install pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN mkdir -p /var/www/symfony

WORKDIR /var/www/symfony
COPY ProjetICO ./

RUN composer config --no-plugins allow-plugins.symfony/flex true

RUN composer install

RUN chown -R www-data:www-data /var/www/symfony

CMD php -S 0.0.0.0:8000 -t public 