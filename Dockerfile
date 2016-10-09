FROM fguillot/alpine-nginx-php7

ADD . /var/www/app/
RUN chown -R nginx:nginx /var/www/app/data
