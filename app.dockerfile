FROM php:7.1-cli

RUN apt-get update && apt-get install -y mysql-client 

EXPOSE 8000:8000
