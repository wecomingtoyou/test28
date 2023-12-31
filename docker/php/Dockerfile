FROM php:8.2-fpm

COPY composer.lock composer.json /var/www/

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    build-essential \
    openssl \
    libssl-dev \
    libzip-dev \
    locales \
    zip \
    unzip \
    git \
    curl \
      && apt-get clean \
      && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install zip exif pcntl pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

COPY . /var/www
COPY --chown=www:www . /var/www
RUN chmod -R ug+w /var/www/storage

USER www

EXPOSE 9000

CMD ["php-fpm"]
