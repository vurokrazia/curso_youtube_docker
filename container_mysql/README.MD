# Mysql

## Steps

* Download image mysql 5.7

  ``` docker
  docker pull mysql:5.7
  ```

* The mysql image need a default password, we can set a password with the key MYSQL_ROOT_PASSWORD
  ``` docker
  docker run -d -p 3306:3306 --name mysql-curse -e MYSQL_ROOT_PASSWORD=123456 mysql
  ```

* we can access to MYSQL terminal in the following way
  ``` docker
  docker exec -it mysql-curse mysql -p
  ```

## Volumes

* Create the docker volume

  ``` docker
    docker volume create mysql-curse-data
    ```
* if exist the container mysq-curse, destroyed

  ``` docker
    docker rm -f mysql-curse
  ```
* if exist the container mysq-curse, destroyed
  ``` docker
  docker run -d -p 3306:3306 --name mysql-curse --env-file .env --mount src=mysql-curse-data,dst=/var/lib/mysql mysql:5.7 
  ``` 

### SQL

#### Create table
``` sql
  CREATE TABLE `example`.`users` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(45) NOT NULL,
    `age` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC));
```
#### Insert user row 
``` sql
INSERT INTO `example`.`users`
(
`name`,
`age`
)
VALUES
("Jesus",
"26");
``` 

### Create a network
``` docker
  docker network create curse-vurokrazia
``` 
###  Create a container with connection a the network
``` docker
  docker run -d -p 3306:3306   --network my-net \
 --name mysql-curse -e MYSQL_ROOT_PASSWORD=123456 --mount src=mysql-curse-data,dst=/var/lib/mysql mysql
``` 

###  Connected container a network
``` docker
 docker network connect curse-vurokrazia mysql-curse
``` 
