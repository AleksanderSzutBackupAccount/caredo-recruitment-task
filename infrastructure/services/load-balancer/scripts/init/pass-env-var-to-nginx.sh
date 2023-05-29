#!/bin/bash

envsubst '$DOMAIN_NAME,$CONTAINER_NAME' < /etc/nginx/nginx.conf.template > /etc/nginx/nginx.conf
