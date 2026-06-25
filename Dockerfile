# =========================
# Frontend Build Stage
# =========================
FROM node:22 AS frontend

WORKDIR /app

COPY package*.json ./

RUN npm ci

COPY . .

RUN npm run build


# =========================
# PHP / Laravel Stage
# =========================
FROM dunglas/frankenphp:php8.3-bookworm

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libzip-dev \
    libicu-dev \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install \
    zip \
    intl \
    pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

# Copy hasil build Vite
COPY --from=frontend /app/public/build ./public/build

RUN composer install \
    --no-dev \
    --prefer-dist \
    --optimize-autoloader \
    --no-interaction

RUN mkdir -p storage/framework/{cache,sessions,views} \
    storage/logs \
    bootstrap/cache

RUN chmod -R 775 storage bootstrap/cache

EXPOSE 8000

CMD ["sh", "-c", "php artisan serve --host=0.0.0.0 --port=${PORT:-8000}"]