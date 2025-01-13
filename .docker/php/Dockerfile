FROM php:8.3-fpm

# Copy configuration files
COPY php.ini /usr/local/etc/php/
COPY docker.conf /usr/local/etc/php-fpm.d/docker.conf
COPY .bashrc /root/

# Copy the entrypoint script
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Update system and install dependencies
RUN apt-get update \
  && apt-get install -y build-essential zlib1g-dev default-mysql-client curl gnupg procps vim git unzip libzip-dev libpq-dev \
  && docker-php-ext-install zip pdo_mysql pdo_pgsql pgsql

# pcntl
RUN docker-php-ext-install pcntl
# Install intl extension
RUN apt-get install -y libicu-dev \
  && docker-php-ext-configure intl \
  && docker-php-ext-install intl

# Install gd extension
RUN apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev && \
  docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ && \
  docker-php-ext-install gd

# Install redis extension
RUN pecl install redis && docker-php-ext-enable redis

# Install pcov extension
RUN pecl install pcov && docker-php-ext-enable pcov

# Optional: Install Xdebug (commented by default)
# RUN pecl install xdebug \
#  && docker-php-ext-enable xdebug \
#  && echo ";zend_extension=xdebug" > /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Install Node.js, NPM, Yarn
RUN curl -sL https://deb.nodesource.com/setup_22.x | bash -
RUN apt-get install -y nodejs
RUN npm install npm@latest -g
RUN npm install yarn -g

# Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

# Install Swoole for Laravel Octane
RUN pecl install swoole \
  && docker-php-ext-enable swoole

# Clone solarized dircolors
WORKDIR /root
RUN git clone https://github.com/seebi/dircolors-solarized

# Expose application ports
EXPOSE 5173 8000

# Set working directory (default for manual setup)
WORKDIR /var/www

#entrypoint
ENTRYPOINT ["entrypoint.sh"]
CMD ["php-fpm"]
