FROM composer:2.5.5 as vendor

WORKDIR /var/www

COPY composer.json composer.json
COPY composer.lock composer.lock

RUN composer install \
   --ignore-platform-reqs \
   --no-interaction \
   --no-plugins \
   --no-scripts \
   --prefer-dist


FROM php:8.2.6-fpm

COPY . /var/www
COPY --from=vendor /var/www/vendor/ /var/www/vendor

RUN chown -R www-data:www-data /var/www

COPY ./infrastructure/services/app/php.ini /etc/php/conf.d/caredo-app.ini

USER $user
