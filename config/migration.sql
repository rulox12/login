DROP DATABASE IF EXISTS `zinobe`;

CREATE DATABASE zinobe;

use zinobe;

DROP TABLE IF EXISTS `users`;

CREATE TABLE users
(
    id          int(255) NOT NULL AUTO_INCREMENT,
    name        varchar(100) NOT NULL,
    email       varchar(100) NOT NULL,
    password    varchar(100) NOT NULL,
    country     varchar(100) NOT NULL,
    document    varchar(30) NOT NULL,
    updated_at  date NULL,
    created_at   date NULL,
    PRIMARY KEY (`id`)

)ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
