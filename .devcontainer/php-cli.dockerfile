FROM php:8.0-cli

RUN apt-get update && \
    apt-get upgrade -y
RUN apt-get install -y git
RUN apt-get install -y openssh-client
RUN apt-get install -y sudo
RUN apt-get install -y vim

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

# Install Node and npm
SHELL ["/bin/bash", "--login", "-c"]
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.35.0/install.sh | bash
RUN nvm install v14
RUN nvm alias default v14

# composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# docker user/ssh
RUN adduser --disabled-password -gecos '' docker
RUN adduser docker sudo
RUN echo '%sudo ALL=(ALL) NOPASSWD:ALL' >> /etc/sudoers
RUN mkdir -p /home/docker/.ssh && ln -s /run/secrets/user_ssh_key /home/docker/.ssh/id_ed25519
RUN chown -R docker:docker /home/docker/.ssh
RUN echo "    IdentityFile ~/.ssh/id_ed25519" >> /etc/ssh/ssh_config

USER docker