<!--affiche le formulaire et la liste des étudiants stockée en base de données-->
<?php
session_start();
require('connect.php');
$select = "SELECT  *  FROM ad";
$ps = $pdo->prepare($select);
$ps->execute();
?>
 
<!DOCTYPE html>
<html lang="fr">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
      integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
      crossorigin="anonymous"/>
      <link rel="stylesheet" href="style.css" class="rel">
 
<body>
<div class="container spacer">
    <div class="shadow-lg p-3 mb-5 bg-body rounded">
        <h1 class="text-center">Carnet d'adresses</h1>
    </div>
 
    <div class="row">
        <div class="col-md-4">
            <?php if (array_key_exists('errors', $_SESSION)) { ?>
                <div class="alert alert-danger">
                    <?= implode('<br>', $_SESSION['errors']); ?>
 
                </div>
                <?php unset($_SESSION['errors']);
            } else { ?>
 
                
                <?php unset($_SESSION['errors']);
            } ?>
   <div class="alert alert-success">
                    Enregistrent effectue avec succes
 
                </div>
 
            <form action="save.php" method="post">
                <div class="form-group">
                    <input type="text" name="nom" id="nom" class="form-control" placeholder="Votre nom"
                           aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Prenom" type="text" name="prenom" id="">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="adresse" type="text" name="adresse" id="">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="codePostal" type="text" name="codePostal" id="">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="ville" type="text" name="ville" id="">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="telephonePortable" type="text" name="telephonePortable" id="">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="email" type="text" name="email" id="">
                </div>

                </div>
                <input class="btn btn-primary" type="submit" name="save" value="Enregistrer"/>
            </form>
        </div>
        <div class="col-md-8">
            <table class="table table-striped">
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>adresse</th>
                    <th>codePostal</th>
                    <th>ville</th>
                    <th>telephonePortable</th>
                    <th>email</th>



                </tr>
                <?php while ($ad = $ps->fetch()) { ?>
                    <tr>
                        <td><?= $ad['nom'] ?></td>
                        <td><?= $ad['prenom'] ?></td>
                        <td><?= $ad['adresse'] ?></td>
                        <td><?= $ad['codePostal'] ?></td>
                        <td><?= $ad['ville'] ?></td>
                        <td><?= $ad['telephonePortable'] ?></td>
                        <td><?= $ad['email'] ?></td>



                        <td><a class="glyphicon glyphicon-edit" href="edit.php?id=<?= $ad['id'] ?>"><i
                                        class="fas fa-edit"></i></i></a></td>
                        <td><a style="color: red"
                               onclick="return confirm('Voulez-vous vraiment supprimer cette personne')"
                               href="delete.php?id=<?= $ad['id'] ?>"><i class="fas fa-trash"></i></i></a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
 
</body>
 
</html>
