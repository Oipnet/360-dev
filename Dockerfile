FROM php:7.1-cli

RUN apt-get update
RUN apt-get install -y unzip
RUN mkdir app
ADD . /app
RUN chmod +x /app/docker.sh
WORKDIR /app
RUN ./docker.sh
EXPOSE 8000

