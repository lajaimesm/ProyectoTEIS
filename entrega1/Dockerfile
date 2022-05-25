FROM php:8.1.4-apache
RUN apt-get update -y && apt-get install -y openssl zip unzip git 
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY . /var/www/html
WORKDIR /var/www/html
RUN cp .env.example .env
RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

COPY . ./
RUN cp .env.example .env
RUN sed -i "/DB_HOST=/c\DB_HOST=\"$DB_HOST\"" .env
RUN sed -i "/DB_DATABASE=/c\DB_DATABASE=\"$DB_DATABASE\"" .env
RUN sed -i "/DB_USERNAME=/c\DB_USERNAME=\"$DB_USERNAME\"" .env
RUN sed -i "/DB_PASSWORD=/c\DB_PASSWORD=\"$DB_PASSWORD\"" .env
RUN sed -i "/APP_ENV=/c\APP_ENV=production" .env
RUN sed -i "/APP_DEBUG=/c\APP_DEBUG=false" .env

RUN php artisan key:generate
RUN chmod -R 777 storage
RUN a2enmod rewrite
RUN service apache2 restart
