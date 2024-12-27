FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libwebp-dev \
    libxpm-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    bash \
    fcgiwrap \
    libmcrypt-dev \
    libonig-dev \
    iputils-ping \
    libpq-dev \
    && rm -rf /var/lib/apt/lists/*

RUN pecl install redis && docker-php-ext-enable redis

RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath opcache


COPY --from=composer/composer:latest-bin /composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress

# Configura el entorno de Laravel
RUN cp .env.example .env
RUN php artisan key:generate

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 755 /var/www/html

USER www-data

EXPOSE 9000

CMD ["php-fpm"]
