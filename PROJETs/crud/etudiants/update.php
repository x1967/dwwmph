<!--traiter les données pour les mettre à jour dans la base données.-->

<?php
 
require('connect.php');
if (isset($_POST['nom'], $_POST['prenom'], $_POST['sexe'])) {
    $update = "UPDATE etudiant SET nom =?, prenom =?, sexe =? WHERE id = ?";
    $ps = $pdo->prepare($update);
    $ps->execute([$_POST['nom'], $_POST['prenom'], $_POST['sexe'], $_POST['id']]);
    header('Location:index.php');
}
