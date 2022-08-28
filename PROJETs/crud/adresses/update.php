<!--traiter les données pour les mettre à jour dans la base données.-->

<?php
 
require('connect.php');
if (isset($_POST['nom'], $_POST['prenom'], $_POST['sexe'])) {
    $update = "UPDATE ad SET nom =?, prenom =?, adresse =?nom =?, codePostal =?, ville =?, telephonePortable=?,email=? WHERE id = ?";
    $ps = $pdo->prepare($update);
    $ps->execute([$_POST['nom'], $_POST['prenom'], $_POST['adresse'],$_POST['codePostal'],$_POST['ville'],$_POST['telephonePortable'],$_POST['email'], $_POST['id']]);
    header('Location:index.php');
}
