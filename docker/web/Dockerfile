FROM nginx:1.21.1

ENV TZ=UTC

# nginx config file
COPY ./docker/web/*.conf /etc/nginx/conf.d/

WORKDIR /var/www/html