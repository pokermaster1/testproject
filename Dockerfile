FROM php:8.1-apache

# Installiere MySQLi
RUN docker-php-ext-install mysqli

# Optional: Installiere PDO und Mod-Rewrite (falls benötigt)
RUN docker-php-ext-install pdo pdo_mysql
RUN a2enmod rewrite