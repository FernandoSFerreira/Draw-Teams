FROM php:8.3.0-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN apk add bash

RUN apk update
RUN apk add tzdata
RUN cp /usr/share/zoneinfo/America/Sao_Paulo /etc/localtime
RUN rm -r /usr/share/zoneinfo/Africa && \
    rm -r /usr/share/zoneinfo/Antarctica && \
    rm -r /usr/share/zoneinfo/Arctic && \
    rm -r /usr/share/zoneinfo/Asia && \
    rm -r /usr/share/zoneinfo/Atlantic && \
    rm -r /usr/share/zoneinfo/Australia && \
    rm -r /usr/share/zoneinfo/Europe  && \
    rm -r /usr/share/zoneinfo/Indian && \
    rm -r /usr/share/zoneinfo/Mexico && \
    rm -r /usr/share/zoneinfo/Pacific && \
    rm -r /usr/share/zoneinfo/Chile && \
    rm -r /usr/share/zoneinfo/Canada
RUN echo "America/Sao_Paulo" >  /etc/timezone

ENV TZ America/Sao_Paulo
ENV LANG pt_BR.UTF-8
ENV LANGUAGE pt_BR.UTF-8
ENV LC_ALL pt_BR.UTF-8

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# WORKDIR /app
# # Install the dependencies
# COPY ./composer.json ./composer.lock /app/
# # Install Composer dependencies
# RUN composer install --no-interaction --optimize-autoloader --prefer-dist --no-scripts --no-dev
# # Copy the application code
# COPY . /app
# # Runs Composer scripts
# RUN composer dump-autoload --optimize --no-dev --classmap-authoritative
# RUN composer clear-cache
# # Após a instalação do Composer
# RUN chown -R www-data:www-data /app

WORKDIR /var/www/html
COPY ./composer.json /var/www/html/
# COPY ./composer.json ./composer.lock /var/www/html/
RUN composer install --no-interaction --optimize-autoloader --prefer-dist --no-scripts --no-dev
COPY . /var/www/html/
RUN composer dump-autoload --optimize --no-dev --classmap-authoritative

# RUN composer remove nunomaduro/collision
RUN composer clear-cache
# RUN composer require nunomaduro/collision
RUN composer dump-autoload

RUN chown -R www-data:www-data /var/www/html/

# COPY ./composer.json ./composer.lock /app/
# RUN composer install --no-interaction --optimize-autoloader --prefer-dist --no-scripts --no-dev


COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 9000
ENTRYPOINT [ "docker-entrypoint.sh" ]
# Comando padrão ao iniciar o contêiner
# CMD ["php", "artisan", "serve", "--env=.env.local", "--host=0.0.0.0", "--port=9000"]