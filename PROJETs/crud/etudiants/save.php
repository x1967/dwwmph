<!--traiter les informations des étudiants pour les stockées en base de données-->
<?php
session_start();
if (!empty($_POST)) {
    $error = [];
    if (empty($_POST['nom'])) {
        $error['nom'] = "Le champs nom est obligatoire";
    } else if (empty($_POST['prenom'])) {
        $error['prenom'] = "Le champs prenom est obligatoire";
    }
    if (empty($error)) {
        require_once('connect.php');
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $sexe = $_POST['sexe'];
        $save = "INSERT  INTO etudiant(nom,prenom,sexe) VALUES(?,?,?)";
        $ps = $pdo->prepare($save);
        $ps->execute([$nom, $prenom, $sexe]);
        header('Location:index.php');
    } else {
        $_SESSION['errors'] = $error;
        header('Location:index.php');
    }
}