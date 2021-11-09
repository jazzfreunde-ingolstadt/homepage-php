FROM php:8.0-apache
EXPOSE 80
EXPOSE 443

RUN apt-get update && \
    apt-get upgrade -y

# php extensions
RUN pecl install xdebug && docker-php-ext-enable xdebug

RUN apt-get install -y \
        libzip-dev \
        zip
RUN docker-php-ext-install -j$(nproc) mysqli
RUN docker-php-ext-install -j$(nproc) pdo
RUN docker-php-ext-install -j$(nproc) pdo_mysql
RUN docker-php-ext-install -j$(nproc) zip
RUN apt-get install libldap2-dev -y \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/ \
    && docker-php-ext-install -j$(nproc) ldap

# apache
RUN openssl req -x509 -newkey rsa:4096 -sha256 -days 3650 -nodes \
  -keyout /etc/apache2/conf-enabled/localhost.key \
  -out /etc/apache2/conf-enabled/localhost.crt \
  -subj "/C=DE/ST=BY/L=Ingolstadt/O=Jazzfreunde Ingolstadt e.V./CN=localhost" \
  -addext "subjectAltName=DNS:localhost,IP:127.0.0.1"

COPY ./apache/localhost.conf /etc/apache2/sites-available/localhost.conf
COPY ./apache/xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN a2dissite 000-default.conf
RUN a2ensite localhost

RUN a2enmod rewrite
RUN a2enmod expires
RUN a2enmod ssl

RUN apachectl restart