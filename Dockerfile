FROM jguyomard/laravel-php
ADD . /var/www
WORKDIR /var/www
#RUN php artisan optimize
#RUN chown -R nginx:nginx /var/www
