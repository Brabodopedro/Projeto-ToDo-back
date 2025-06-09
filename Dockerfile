FROM php:8.2-fpm

# Instalar dependências
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    git \
    libzip-dev \
    netcat-openbsd \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd

WORKDIR /var/www

# Copia o conteúdo do projeto Laravel
COPY . .

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install

# Permissões
RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www

# ✅ Copia o script de entrada e garante permissão de execução
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Inicia pelo script customizado
ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
