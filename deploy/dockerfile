# Use an official PHP runtime as parent
FROM php:${PHP_VERSION:-7.2}-fpm

# add credentials on build
RUN mkdir -p /root/.ssh
ADD ./.ssh/id_rsa /root/.ssh/id_rsa
RUN chmod 700 /root/.ssh/id_rsa \
	&& echo "Host github.com\n\tStrictHostKeyChecking no\n" >> /root/.ssh/config

# Make Sure we are Up To Date
RUN apt update \
	&& apt install -y p7zip \
    p7zip-full \
    zip \
    unzip \
    git \
    nginx \
    wget \
    && rm -f /etc/nginx/sites-enabled/default \
    && docker-php-ext-install mbstring pdo_mysql

# Copy HTML File
ADD ./nginx.conf /etc/nginx/conf.d/api.prionplatform.conf

EXPOSE 9000
CMD ["php-fpm", "-F"]

# Start nginx
CMD ["nginx", "-g", "daemon off;"]

# Pull from Git Repo
RUN cd /var/www/html \
	&& git init \
	&& git pull git@github.com:priondevelopment/platform-api.git master \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer \
    && cd /var/www/html \
	&& composer update \
	&& composer dump-autoload \
    && php artisan optimize \
	&& php artisan route:clear \
	&& php artisan config:clear