<!--fichier de connection-->

<?php
try{
$pdo = new  PDO('mysql:host=localhost;dbname=etudiants','root','');
}catch(PDOException  $ex){
$message = "Erreur";
echo  $message  .  ''  .$ex->getMessage();
}