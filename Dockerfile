# ─── Stage 1: Node (Vite build) ───────────────────────────────────────────────
FROM node:20-alpine AS node_builder

WORKDIR /app

COPY package.json package-lock.json ./
RUN npm ci

COPY . .
COPY .env.docker .env

RUN npm run build


# ─── Stage 2: PHP App ─────────────────────────────────────────────────────────
FROM php:8.2-fpm-alpine

WORKDIR /var/www/html

# Install system dependencies
RUN apk add --no-cache \
    bash \
    git \
    curl \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    oniguruma-dev \
    freetype-dev \
    libjpeg-turbo-dev

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/bin/composer \
    && chmod +x /usr/bin/composer

# 🔥 IMPORTANT: copy ONLY composer files first
COPY composer.json composer.lock ./

# Install dependencies FIRST (clean state)
ENV COMPOSER_MEMORY_LIMIT=-1
RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction \
    --prefer-dist \
    --no-scripts

# THEN copy rest of project
COPY . .

RUN php artisan package:discover --ansi

# Copy env
COPY .env.docker .env

# Copy built frontend
COPY --from=node_builder /app/public/build ./public/build

# Fix permissions
RUN chown -R www-data:www-data /var/www/html/storage \
    && chown -R www-data:www-data /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

EXPOSE 9000

CMD ["php-fpm"]