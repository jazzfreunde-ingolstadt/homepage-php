FROM php:8.2-cli

LABEL version="1.1.0" \
    author="Michael Mayer" \
    email="business.miche.mayer@outlook.de"

ARG project_dir
ARG phpini_path

SHELL ["/bin/bash", "--login", "-c"]

RUN apt-get update && \
    apt-get upgrade -y
RUN apt-get install -y git
RUN apt-get install -y openssh-client
RUN apt-get install -y sudo
RUN apt-get install -y vim

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
    && docker-php-ext-install -j$(nproc) pdo_mysql mysqli \
    && docker-php-ext-enable pdo_mysql mysqli

RUN docker-php-source extract \
    && mkdir -p /usr/src/php/ext/apcu \
    && curl -fsSL https://github.com/krakjoe/apcu/archive/v5.1.21.tar.gz | tar xvz -C /usr/src/php/ext/apcu --strip 1 \
    && docker-php-ext-install apcu \
    && docker-php-source delete

RUN apt-get install -y libldap2-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/ \
    && docker-php-ext-install -j$(nproc) ldap

# Install Node and npm
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.3/install.sh | bash
RUN nvm install v18
RUN nvm alias default v18
RUN npm install -g npm@latest

# php
COPY ${phpini_path} /usr/local/etc/php/conf.d/custom.ini

# composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer