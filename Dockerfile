FROM php:7.4-fpm

# Installation des extensions PHP nécessaires
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Installation de Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le répertoire de travail
WORKDIR /var/www

# Copier l'application Laravel
COPY . /var/www

# Donner la permission au dossier de stockage
RUN chown -R www-data:www-data /var/www/storage
RUN chmod -R 775 /var/www/storage

# Exposer le port sur lequel Laravel s'exécute
EXPOSE 9000

# Démarrer PHP-FPM
CMD ["php-fpm"]
