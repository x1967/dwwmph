
<!--Script pour se connecter à une base de données MySQL avec PHP PDO-->

<?php
    $host = 'localhost';
    $dbname = 'librairie';
    $username = 'root';
    $password = '';
 
  try {
  
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    
    echo "Connecté à la base $dbname sur $host avec succès.";
    
    //envoyer donnees en utf8
  $db->exec("set names utf8");

    //on definit le mode de "fetch" par defaut
      $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,
      PDO::FETCH_ASSOC);

  } catch (PDOException $e) {
  
    die("Impossible de se connecter à la base de données $dbname :" . $e->getMessage());
    
  }
  //$dsn = "mysql:host=$host;dbname=$dbname"; 
  
  // ecriture requete
  $sql = "SELECT titreLivre from livres";

  
   
  //execute requete
  $requete=$db->query($sql);

  //recupere les données
  $livres=$requete->fetchALL();
  echo"<pre>";
  var_dump($livres);
  echo"<pre>";


?>


<?php
 // ajoute livre (fonctionnel)
/*$sql="INSERT INTO `livres` (`idlivre`, `titreLivre`, `categorieLivre`, `descriptionLivre`, `auteurLivre`, `imgLivre`, `etatLivre`, `reEditionLivre`, `prixNeufLivre`, `prixOccasionLivre`, `codeBarreLivre`, `ISBN`, `stock`) 
//VALUES ('201', 'bidule', 'regle', 'ggg', 'aa', '', '5', '1', '10', '5', '', '', '')";
//echo "ajouté avec succès";*/


/*suppresion livre (fonctionnel)
$sql = "DELETE FROM livres WHERE idlivre = 200";
$requete=$db->prepare($sql);
$requete->execute();*/


/*modification livre (fonctionnel)
$sql="UPDATE livres SET titreLivre = 'machin bidule' WHERE idlivre = 199";
$requete=$db->prepare($sql);
$requete->execute();*/


 ?>
 
