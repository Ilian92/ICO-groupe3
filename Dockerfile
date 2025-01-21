FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    curl \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install xml

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN mkdir -p /var/www/symfony

WORKDIR /var/www/symfony
COPY ./ ./

RUN composer config --no-plugins allow-plugins.symfony/flex true


# Ajouter un utilisateur non-root
RUN useradd -ms /bin/bash symfony
RUN chown -R symfony:symfony /var/www/symfony

# Exécuter les commandes composer en tant qu'utilisateur non-root

# Revenir à l'utilisateur root pour changer les permissions
USER root
RUN chown -R www-data:www-data /var/www/symfony

CMD bash -c "composer require symfony/orm-pack && composer install && composer require twig && composer require symfony/twig-bundle && php -S 0.0.0.0:8000 -t public"