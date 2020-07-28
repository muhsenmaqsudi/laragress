FROM composer:latest as builder

WORKDIR /app/

RUN composer global require hirak/prestissimo --no-plugins --no-scripts

COPY composer.* ./

RUN docker-php-ext-install pcntl

RUN composer install \
    --ignore-platform-reqs \
    --no-plugins \
    --no-scripts \
    --no-dev \
    --prefer-dist \
    --no-autoloader \
    && rm -rf /root/.composer

FROM node:lts as frontend

RUN mkdir -p /app/public

COPY package*.json webpack.mix.js /app/
COPY resources /app/resources

WORKDIR /app/

RUN npm install && npm run production

FROM php:7.3-fpm

WORKDIR /srv

COPY . /srv
COPY --from=builder /app/vendor /srv/vendor
COPY --from=frontend /app/public/js/ /srv/public/js/
COPY --from=frontend /app/public/css/ /srv/public/css/
#COPY --from=frontend /app/public/mix-manifest.json /srv/public/mix-manifest.json

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get install -y nodejs npm


#RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.35.3/install.sh | bash
#ENV NVM_DIR=/root/.nvm
#RUN "$NVM_DIR/nvm.sh" && nvm install --lts

#RUN . "$NVM_DIR/nvm.sh" && nvm use v${NODE_VERSION}
#RUN . "$NVM_DIR/nvm.sh" && nvm alias default v${NODE_VERSION}
#ENV PATH="/root/.nvm/versions/node/v${NODE_VERSION}/bin/:${PATH}"

RUN composer dump-autoload --no-scripts --no-dev --optimize

RUN pecl install redis && docker-php-ext-enable redis

EXPOSE 9000

CMD ["php-fpm"]
