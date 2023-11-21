FROM php:fpm
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
COPY --from=composer:2.0 /usr/bin/composer /usr/local/bin/composer