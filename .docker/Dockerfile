FROM ubuntu:22.04

ENV DEBIAN_FRONTEND=noninteractive
ENV TZ=America/Sao_Paulo

RUN apt-get update && apt-get install -y \
    tzdata \
    software-properties-common \
    curl \
    wget \
    gnupg \
    && ln -fs /usr/share/zoneinfo/$TZ /etc/localtime \
    && dpkg-reconfigure --frontend noninteractive tzdata

RUN add-apt-repository ppa:ondrej/php \
    && apt-get update

RUN apt-get install -y \
    php8.2-fpm \
    php8.2-cli \
    php8.2-gd \
    php8.2-mbstring \
    php8.2-xml \
    php8.2-zip \
    php8.2-curl \
    php8.2-mongodb \
    php8.2-sqlite3 \
    php8.2-mysql \
    php8.2-dev \
    nginx \
    supervisor \
    php-pear \
    zip \
    unzip \
    sqlite3 \
    libsqlite3-dev

RUN pecl install redis \
    && echo "extension=redis.so" > /etc/php/8.2/cli/conf.d/20-redis.ini \
    && echo "extension=redis.so" > /etc/php/8.2/fpm/conf.d/20-redis.ini

RUN echo "extension=mongodb.so" > /etc/php/8.2/fpm/conf.d/20-mongodb.ini \
    && echo "extension=mongodb.so" > /etc/php/8.2/cli/conf.d/20-mongodb.ini

RUN echo "extension=sqlite3.so" > /etc/php/8.2/fpm/conf.d/20-sqlite3.ini \
    && echo "extension=sqlite3.so" > /etc/php/8.2/cli/conf.d/20-sqlite3.ini

RUN wget https://getcomposer.org/download/2.2.3/composer.phar -O /usr/local/bin/composer \
    && chmod +x /usr/local/bin/composer

RUN useradd -m -s /bin/bash nginxuser

COPY supervisord.ini /etc/supervisor.d/supervisord.ini

COPY nginx.conf /etc/nginx/sites-available/default
COPY nginx.conf /etc/nginx/
COPY nginx-99x-api.conf /etc/nginx/modules/

RUN rm -f /etc/nginx/sites-enabled/default \
    && ln -s /etc/nginx/sites-available/default /etc/nginx/sites-enabled/

WORKDIR /var/www/html
RUN groupadd -g 1001 developer \
    && useradd -u 1001 -g developer developer
COPY --chown=developer:developer . /var/www

RUN mkdir -p /var/www/html/public \
    && chmod -R 755 /var/www/html/public \
    && chown -R root:root /var/www/html

EXPOSE 80

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor.d/supervisord.ini"]