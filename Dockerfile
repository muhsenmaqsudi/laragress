FROM composer:latest as builder

WORKDIR /app/

RUN composer global require hirak/prestissimo --no-plugins --no-scripts

COPY composer.* ./

RUN docker-php-ext-install pcntl

RUN composer install --prefer-dist --no-scripts --no-dev --no-autoloader && rm -rf /root/.composer

FROM php:7.3-fpm

WORKDIR /srv

COPY --from=builder /app/vendor /srv/vendor
COPY . /srv
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer dump-autoload --no-scripts --no-dev --optimize

RUN pecl install redis && docker-php-ext-enable redis

EXPOSE 9000

CMD ["php-fpm"]
