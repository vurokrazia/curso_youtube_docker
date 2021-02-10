# README

## Requirements
- wordpress
- mysql 5.7
- Docker 19.03.12

## Instalation with docker
### create network
  - docker network create wordpress
### create volume
  - docker volume  create wordpress-db
### create container MYSQL
  - docker run -d -p 3306:3306 --name wordpress-mysql --network wordpress --env-file .env --mount src=wordpress-db,dst=/var/lib/mysql mysql:5.7 
### create container WORDPRESS
  - docker run -itd -p 81:80 --name wordpress --network wordpress --mount type=bind,source="$(pwd)/site",target=/var/www/html --env-file .env wordpress:latest
