<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscriptions</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="body-inscriptions">

    <form action="accueil.php">
        <input type="submit" class="btn-inscriptions-nav" value="Accueil">
    </form>

        <section class="section-inscriptions">

            <div class="div-inscriptions">

                <form class="forme" action="inscriptions.php" method="post">

                    <h2 class="h2-inscriptions">INSCRIVEZ VOUS</h2>
                    
                        <p class="para-inscriptions">   Nom:       <input type="text" name="nom_user" /> <br> <br>
                                                        Prénom :   <input type="text" name="prenom_user" /> <br> <br>
                                                        Email :     <input type="text" name="email_user" /> <br> <br>
                                                        Password : <input type="password" name="password" /> <br> <br>
                                                                   <input type="submit" class="btn-inscriptions" name="btn-inscriptions" value="VALIDER"/></p>
                </form>
            </div>
        </section>
    </body>
</html>