FROM php:8.2-apache

# Instalar dependencias necesarias
RUN apt-get update -y && apt-get install -y \
    openssl \
    zip \
    unzip \
    git \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev

# Instalar y configurar la extensión gd
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

# Instalar la extensión pdo_mysql
RUN docker-php-ext-install pdo_mysql

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copiar archivos de la aplicación
COPY . /var/www/html
COPY ./public/.htaccess /var/www/html/.htaccess

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Instalar dependencias de Composer
RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

# Generar la clave de la aplicación
RUN php artisan key:generate
RUN php artisan db:seed

# Ejecutar migraciones y seeders
RUN php artisan migrate --force
RUN php artisan db:seed --force

# Configurar permisos
RUN chmod -R 777 storage
RUN chmod -R 777 public/img/movies
RUN chmod -R 777 public/img/news

# Crear enlaces simbólicos
RUN php artisan storage:link

# Habilitar el módulo rewrite de Apache
RUN a2enmod rewrite

# Reiniciar el servicio de Apache
RUN service apache2 restart

# Ajustar la configuración de Apache para apuntar a la carpeta public
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf