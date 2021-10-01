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
COPY ./apache/localhost.conf /etc/apache2/sites-available/localhost.conf
COPY ./apache/localhost.crt /etc/apache2/conf-enabled/localhost.crt
COPY ./apache/localhost.key /etc/apache2/conf-enabled/localhost.key
COPY ./apache/xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN a2dissite 000-default.conf
RUN a2ensite localhost

RUN a2enmod rewrite
RUN a2enmod expires
RUN a2enmod ssl

RUN apachectl restart