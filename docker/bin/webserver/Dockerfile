FROM php:7.3.11-apache

RUN apt-get -y update --fix-missing
RUN apt-get upgrade -y

# Install tools & libraries
RUN apt-get -y install apt-utils nano wget dialog \
    build-essential git curl zip libxml2-dev libxslt-dev unrar-free

# Install important libraries
RUN apt-get -y install --fix-missing apt-utils build-essential git curl zip \
    libmcrypt-dev libsqlite3-dev libsqlite3-0 mariadb-client zlib1g-dev \
    libicu-dev libfreetype6-dev libjpeg62-turbo-dev libpng-dev

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# PHP Extensions
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
RUN docker-php-ext-install bcmath calendar exif gettext pcntl shmop soap sockets sysvmsg sysvsem \
    sysvshm wddx xsl pdo_mysql pdo_sqlite mysqli tokenizer json
RUN docker-php-ext-install -j$(nproc) intl
RUN docker-php-ext-install mbstring
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
RUN docker-php-ext-install -j$(nproc) gd

# Enable apache modules
RUN a2enmod rewrite headers

ENTRYPOINT ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
