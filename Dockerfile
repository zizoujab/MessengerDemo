FROM php:8.2-cli

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions zip amqp bz2 xsl
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer