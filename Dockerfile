FROM php:8.1.9-fpm-alpine3.16

WORKDIR /var/www/html

# Основные зависимости
RUN docker-php-ext-configure opcache --enable-opcache && \
    apk update && apk add bash unzip git

RUN set -ex \
  && apk --no-cache add \
    postgresql-dev \
    libzip-dev

RUN docker-php-ext-install pdo pdo_pgsql

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN find . -type f -exec chmod 664 {} \; && \
    find . -type d -exec chmod 775 {} \; && \
    mkdir -p storage && mkdir -p bootstrap/cache && \
    chmod -R ug+rwx storage bootstrap/cache

CMD php-fpm;
