ARG php_version="8.2"

FROM php:${php_version}-apache

ARG virtualhost_conf_dir
ARG phpini_path
ARG xdebugini_path 
ARG xdebug_logdir
ARG cache_dirs

EXPOSE 80
EXPOSE 443

ENV VIRTUALHOST_FILE_PATH=${virtualhost_conf_dir}/localhost.conf
ENV XDEBUG_INI_PATH=${xdebugini_path}
ENV PHP_INI_PATH=${phpini_path}
ENV XDEBUG_LOG=${xdebug_logdir}/xdebug.log

SHELL ["/bin/bash", "--login", "-c"]

RUN apt-get update && \
  apt-get upgrade -y

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
  && curl -fsSL https://github.com/krakjoe/apcu/archive/refs/tags/v5.1.24.tar.gz | tar xvz -C /usr/src/php/ext/apcu --strip 1 \
  && docker-php-ext-install apcu \
  && docker-php-source delete

RUN apt-get install -y libldap2-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-configure ldap --with-libdir=lib/$(uname -m)-linux-gnu/ \
    && docker-php-ext-install -j$(nproc) ldap

RUN docker-php-ext-install opcache

# xDebug
RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN mkdir -p $XDEBUG_LOG && touch $XDEBUG_LOG && chmod +rw $XDEBUG_LOG

COPY $XDEBUG_INI_PATH /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# php
COPY $PHP_INI_PATH /usr/local/etc/php/conf.d/custom.ini

# apache
RUN openssl genrsa -out /etc/apache2/conf-enabled/localhost.key 3072
RUN openssl req -new -out rootCA.csr -sha256 -key /etc/apache2/conf-enabled/localhost.key -subj "/C=DE/ST=BY/L=Ingolstadt/O=Jazzfreunde Ingolstadt e.V./CN=localhost" -addext "subjectAltName=DNS:localhost,IP:127.0.0.1"
RUN openssl x509 -req -in rootCA.csr -days 365 -signkey /etc/apache2/conf-enabled/localhost.key -out /etc/apache2/conf-enabled/localhost.cert -outform PEM

COPY $VIRTUALHOST_FILE_PATH /etc/apache2/sites-available/localhost.conf

RUN a2dissite 000-default.conf
RUN a2ensite localhost

RUN a2enmod rewrite
RUN a2enmod expires
RUN a2enmod ssl
RUN a2enmod headers

RUN apachectl restart

# Cache dir permissions
RUN mkdir -p ${cache_dirs} && chmod -R go+rw ${cache_dirs}