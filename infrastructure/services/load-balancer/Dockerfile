FROM nginx:1.25.0-alpine

ENV DOMAIN_NAME='localhost'
ENV CONTAINER_NAME='app'

WORKDIR /app

COPY ./scripts /scripts

RUN chmod -R +x /scripts

COPY ./conf/nginx.conf.template /etc/nginx/nginx.conf.template

RUN /bin/sh /scripts/init/pass-env-var-to-nginx.sh
