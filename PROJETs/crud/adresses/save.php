<!--traiter les informations des étudiants pour les stockées en base de données-->
<?php
session_start();
if (!empty($_POST)) {
    $error = [];
    if (empty($_POST['nom'])) {
        $error['nom'] = "Le champ nom est obligatoire";
    } else if (empty($_POST['prenom'])) {
        $error['prenom'] = "Le champ prenom est obligatoire";
    }
    if (empty($error)) {
        require_once('connect.php');
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $codePostal = $_POST['codePostal'];
        $ville = $_POST['ville'];
        $telephonePortable = $_POST['telephonePortable'];
        $email = $_POST['email'];

        $save = "INSERT INTO ad(nom,prenom,adresse,codePostal,ville,telephonePortable,email) VALUES(?,?,?,?,?,?,?)";
        $ps = $pdo->prepare($save);
        $ps->execute([$nom, $prenom, $adresse,$codePostal,$ville,$telephonePortable,$email]);
        header('Location:index.php');
    } else {
        $_SESSION['errors'] = $error;
        header('Location:index.php');
    }
}