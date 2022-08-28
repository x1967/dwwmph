<!--traiter les infos pour la suppression-->

<?php
require('connect.php');
if (isset($_GET['id'])) {
 
    $id = $_GET['id'];
 
    $delete = "DELETE  FROM etudiant WHERE id = ?";
 
    $ps = $pdo->prepare($delete);
 
    $ps->execute([$id]);
    header('Location:index.php');
}