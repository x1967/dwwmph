<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexions</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="body-connexions">

    <form action="accueil.php">
        <input type="submit" class="btn-connexions-nav" value="Accueil">
    </form>

<section class="section-connexions">

    <div class="div-connexions">

        <form class="forme-connexions" action="connexions.php" method="post">

            <h2 class="h2-connexions">CONNECTEZ VOUS</h2>
            
            <?php echo $erreur; ?>
            <p class="para-connexions">LOGIN : <input class="username-connexions" type="text" name="username" placeholder="Username" req></p>
            <p class="para-connexions">PASSWORD : <input class="password-connexions" type="password" name="password" placeholder="Password" pattern="[A-Z][0-9]{8-15}[!,%,&,@,#,$,^,*,?,_,~]"></p>
            <p class="para-connexions"><input class="btn-connexions" type="submit" name="btn-connexions" value="Connexion" /> <input class="btn-connexions" type="submit" name="btn-connexions" value="Inscription" onclick="return action='inscriptions.php'"></p>
        </form>
    </div>
</section>
</body>
</html>