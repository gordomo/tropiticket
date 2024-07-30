FROM php:7.4.30-fpm-alpine3.15

# Instalar extensiones necesarias y sus dependencias
RUN apk update \
    && apk upgrade \
    && apk add --no-cache \
        coreutils  \
        freetype-dev \
        libpng-dev \
        libjpeg-turbo-dev \
        libzip-dev \
        libltdl \
        libmcrypt-dev \
        postgresql-dev \
        bash \
        npm \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install zip \
    && docker-php-ext-install bcmath \
    && docker-php-ext-install pdo pdo_pgsql pdo_mysql

RUN apk update \
    && apk fetch gnupg \
    && apk add gnupg \
    && gpg --list-keys

RUN echo 'https://dl-cdn.alpinelinux.org/alpine/v3.14/community' >> /etc/apk/repositories
RUN echo 'https://dl-cdn.alpinelinux.org/alpine/v3.14/main' >> /etc/apk/repositories

# persistent / runtime deps
RUN apk update \
    && apk add --no-cache \
        wkhtmltopdf \
        xvfb \
        ttf-dejavu ttf-droid ttf-freefont ttf-liberation \
    ;

RUN ln -s /usr/bin/wkhtmltopdf /usr/local/bin/wkhtmltopdf;
RUN chmod +x /usr/local/bin/wkhtmltopdf;

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Dar permisos para editar archivos en /var/www
RUN chown -R www-data /var/www/* \
    && chmod -R a+w /var/www/*

# Limpiar cache de apk
RUN rm -rf /var/cache/apk/*

CMD ["php-fpm"]
