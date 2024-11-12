# Utiliser l'image officielle PHP avec Apache
FROM php:8.1-apache

# Installer les extensions PHP nécessaires
RUN docker-php-ext-install pdo pdo_mysql

# Copier votre code source dans le conteneur
COPY ./public /var/www/html/

# Copier les fichiers de configuration si nécessaire (par exemple .htaccess)
COPY ./.htaccess /var/www/html/.htaccess

# Exposer le port 80 pour accéder à l'application via le navigateur
EXPOSE 80

# Commande à exécuter au démarrage du conteneur
CMD ["apache2-foreground"]
