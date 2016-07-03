FROM fguillot/alpine-nginx-php7

ADD docker/env.conf /etc/php7/php-fpm.d/env.conf
ADD . /var/www/app/
RUN chown -R nginx:nginx /var/www/app/data
