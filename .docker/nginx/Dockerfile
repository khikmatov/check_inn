FROM nginx:alpine

COPY .docker/nginx/nginx.conf /etc/nginx/

RUN apk update \
    && apk upgrade \
    && apk --update add logrotate \
    && apk add --no-cache openssl \
    && apk add --no-cache bash

RUN set -x ; \
    addgroup -g 82 -S www-data ; \
    adduser -u 82 -D -S -G www-data www-data && exit 0 ; exit 1

ARG PHP_UPSTREAM_CONTAINER=app
ARG PHP_UPSTREAM_PORT=9000

# Set upstream conf and remove the default conf
RUN echo "upstream php-upstream { server ${PHP_UPSTREAM_CONTAINER}:${PHP_UPSTREAM_PORT}; }" \
       > /etc/nginx/conf.d/upstream-php.conf \
    && rm /etc/nginx/conf.d/default.conf

COPY .docker/nginx/sites/default.conf /etc/nginx/conf.d/default.conf
COPY ./public /var/www/public

CMD ["nginx"]

EXPOSE 80 443