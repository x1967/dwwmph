CREATE DATABASE IF NOT EXISTS `etudiants` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `etudiants`;

CREATE  TABLE etudiant(
id int  primary  key auto_increment,
nom VARCHAR(30),
prenom VARCHAR(30),
sexe VARCHAR(6)
)