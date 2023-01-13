FROM php:8.2-apache

LABEL version="1.1.0" \
  author="Michael Mayer" \
  email="business.miche.mayer@outlook.de"

EXPOSE 80
EXPOSE 443

SHELL ["/bin/bash", "--login", "-c"]

RUN apt-get update && \
  apt-get upgrade -y

ARG virtualhost_conf_dir
ARG phpini_path
ARG xdebuginit_path 
ARG xdebug_logdir
ARG cache_dirs

# php extensions
RUN apt-get install -y libzip-dev zip \
  && docker-php-ext-install -j$(nproc) zip
RUN docker-php-ext-install -j$(nproc) exif
RUN apt-get install -y libicu-dev \
  && docker-php-ext-configure intl \
  && docker-php-ext-install -j$(nproc) intl
RUN apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
  && docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg \
  && docker-php-ext-install -j$(nproc) gd

RUN docker-php-ext-install -j$(nproc) mysqli
RUN docker-php-ext-install -j$(nproc) pdo
RUN apt-get install -y libpq-dev \
  && docker-php-ext-install -j$(nproc) pdo_mysql mysqli
RUN apt-get install -y libpq-dev \
  && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
  && docker-php-ext-install -j$(nproc) pdo_pgsql pgsql

RUN docker-php-source extract \
  && mkdir -p /usr/src/php/ext/apcu \
  && curl -fsSL https://github.com/krakjoe/apcu/archive/v5.1.21.tar.gz | tar xvz -C /usr/src/php/ext/apcu --strip 1 \
  && docker-php-ext-install apcu \
  && docker-php-source delete

# xDebug
RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN mkdir -p ${xdebug_logdir}/xdebug.log && touch ${xdebug_logdir}/xdebug.log && chmod +rw ${xdebug_logdir}/xdebug.log

COPY ${xdebuginit_path} /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# php
COPY ${phpini_path} /usr/local/etc/php/conf.d/custom.ini

# apache
RUN openssl req -x509 -newkey rsa:4096 -sha256 -days 3650 -nodes \
  -keyout /etc/apache2/conf-enabled/localhost.key \
  -out /etc/apache2/conf-enabled/localhost.crt \
  -subj "/C=DE/ST=BY/L=Ingolstadt/O=Jazzfreunde Ingolstadt e.V./CN=localhost" \
  -addext "subjectAltName=DNS:localhost,IP:127.0.0.1"

COPY ${virtualhost_conf_dir}/localhost.conf /etc/apache2/sites-available/localhost.conf

RUN a2dissite 000-default.conf
RUN a2ensite localhost

RUN a2enmod rewrite
RUN a2enmod expires
RUN a2enmod ssl

RUN apachectl restart

# Cache dir permissions
RUN mkdir -p ${cache_dirs} && chmod -R go+rw ${cache_dirs}