
FROM php:7.1-cli

RUN apt-get update
RUN DEBIAN_FRONTEND=noninteractive apt-get install -y unzip mysql-server

RUN mkdir app
ADD ./ /app
WORKDIR /app

EXPOSE 3000:8000
