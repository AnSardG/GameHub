# Usa la imagen base de php:7.4-apache
FROM php:7.4-apache

# Instala las extensiones necesarias
RUN docker-php-ext-install pdo pdo_mysql

# Habilita el módulo de reescritura de Apache
RUN a2enmod rewrite