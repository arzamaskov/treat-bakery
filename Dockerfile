FROM php:8.2-fpm-alpine

RUN apk update     && apk upgrade     && apk add --update --no-cache vim nodejs yarn git bash mysql-client

RUN docker-php-ext-install bcmath mysqli pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -L https://cs.symfony.com/download/php-cs-fixer-v3.phar -o php-cs-fixer
RUN chmod a+x php-cs-fixer
RUN mv php-cs-fixer /usr/local/bin/php-cs-fixer

RUN curl -L https://squizlabs.github.io/PHP_CodeSniffer/phpcs.phar -o phpcs
RUN curl -L https://squizlabs.github.io/PHP_CodeSniffer/phpcbf.phar -o phpcbf
RUN chmod a+x phpcs phpcbf
RUN mv phpcs phpcbf /usr/local/bin/

RUN mkdir /app
WORKDIR /app

RUN addgroup -g 1000 arzamaskov     && adduser -u 1000 -G arzamaskov -D arzamaskov     && chown -R arzamaskov:arzamaskov /app

USER arzamaskov

ADD . /app
ENV PATH=/app/bin:/app/bin:/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin

EXPOSE 8000
CMD php artisan serve -h 0.0.0.0 -p 8000

