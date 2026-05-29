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
ENV PHP_DISPLAY_ERRORS=1
ENV APP_KEY=base64:1uWdqaraLmxLSoRzJDKXqZZqDtZ5kLvNsVQ1R3vVhrw=
ENV APP_ENV=production
ENV APP_DEBUG=true
ENV DB_CONNECTION=sqlite
ENV DB_DATABASE=/app/database/database.sqlite

EXPOSE 80
CMD php artisan config:clear && php artisan migrate --force && supervisord