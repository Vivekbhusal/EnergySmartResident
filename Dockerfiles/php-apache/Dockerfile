FROM php:5.5-apache

RUN sed -i 's/DocumentRoot \/var\/www\/html/DocumentRoot \/var\/www\/html\/src/g' /etc/apache2/apache2.conf
RUN a2enmod rewrite

RUN apt-get update
# RUN DEBIAN_FRONTEND=noninteractive apt-get -yq install libgcrypt11-dev zlib1g-dev libpng12-0-dev libjpeg62-turbo-# dev php5-gd
RUN docker-php-ext-install mysql
RUN docker-php-ext-install mbstring
# RUN docker-php-ext-configure gd --with-jpeg-dir=/usr/include/
# RUN docker-php-ext-install gd
RUN docker-php-ext-install mysqli
RUN yes "" | pecl install memcache
RUN yes "" | pecl install xdebug

RUN echo extension=memcache.so >> /usr/local/etc/php/conf.d/memcache_ext.ini;\
    echo zend_extension=xdebug.so >> /usr/local/etc/php/conf.d/xdebug.ini;\
    echo xdebug.remote_enable=1 >> /usr/local/etc/php/conf.d/xdebug.ini;\
    echo xdebug.remote_autostart=0 >> /usr/local/etc/php/conf.d/xdebug.ini;\
    echo xdebug.remote_connect_back=1 >> /usr/local/etc/php/conf.d/xdebug.ini;\
    echo xdebug.remote_port=9000 >> /usr/local/etc/php/conf.d/xdebug.ini;

EXPOSE 9000

COPY start_up.sh /
RUN chmod a+x /start_up.sh
RUN usermod -u 1000 www-data
CMD ["/start_up.sh"]
