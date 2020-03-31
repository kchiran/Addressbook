CREATE DATABASE mycontacts CHARACTER SET  utf8 COLLATE utf8_general_ci;

USE mycontacts;

CREATE TABLE mycontacts (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar (100) NOT NULL,
    email varchar (100) NOT NULL,
    Address varchar (255) NOT NULL,
    gender varchar(1) NOT NULL,
    phonecode INT(3) NOT NULL,
    phone INT(9) NOT NULL);