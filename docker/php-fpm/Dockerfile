FROM php:8.3-fpm
RUN apt-get update

RUN apt-get update && apt-get install -y \
        libssl-dev \
        libicu-dev \
        libzip-dev \
        libonig-dev \
        unzip \
  && docker-php-ext-install -j$(nproc) iconv pdo_mysql mysqli intl zip pcntl exif \
  && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
  && php composer-setup.php \
  && php -r "unlink('composer-setup.php');" \
  && mv composer.phar /usr/local/bin/composer
