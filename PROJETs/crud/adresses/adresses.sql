CREATE DATABASE IF NOT EXISTS `adresses` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `adresses`;

CREATE  TABLE ad(
id int  primary  key auto_increment,
nom VARCHAR(30),
prenom VARCHAR(30),
adresse VARCHAR(50),
codePostal VARCHAR(5),
ville VARCHAR(50),
telephonePortable varchar(10),
email varchar(30)
)