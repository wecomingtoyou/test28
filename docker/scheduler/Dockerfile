FROM php:8.2-cli

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    build-essential \
    openssl \
    libssl-dev \
    supervisor \
    libzip-dev \
    locales \
    zip \
    unzip \
    git \
    curl \
      && apt-get clean \
      && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install zip exif pcntl pdo_mysql

RUN touch /var/log/cron.log
RUN touch /var/log/queue.log
RUN touch /var/log/supervisord.log

COPY docker/scheduler/supervisord.conf /etc/supervisor/supervisord.conf

COPY . /var/www

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

COPY . /var/www
COPY --chown=www:www . /var/www

RUN chmod -R ug+w /var/www/storage

USER www

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/supervisord.conf"]
