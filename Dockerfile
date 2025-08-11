# Usa una imagen base oficial de PHP con Apache
FROM php:8.2-apache

# Copia los archivos de tu proyecto al directorio de Apache
COPY . /var/www/html/

# Instala extensiones de PHP necesarias, en este caso para mysqli
RUN docker-php-ext-install mysqli

# Expón el puerto 80
EXPOSE 80