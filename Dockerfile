FROM webdevops/php-apache:8.2

WORKDIR /app

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN mkdir -p storage/framework/{sessions,views,cache} \
    storage/logs bootstrap/cache \
    && chmod -R 777 storage bootstrap/cache \
    && touch database/database.sqlite \
    && chmod 777 database/database.sqlite

ENV WEB_DOCUMENT_ROOT=/app/public
ENV PHP_DISPLAY_ERRORS=0

EXPOSE 80

CMD php artisan migrate --force && supervisord