<?php
// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM livres ORDER BY date DESC LIMIT 5');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?=template_header('Home')?>

<div class="featured">
    <h2>Shop</h2>
</div>
<div class="recentlyadded content-wrapper">
    <h2>Ajout récent</h2>
    <div class="products">
        <?php foreach ($recently_added_products as $livre): ?>
        <!--<a href="index.php?page=livre&id=<?=$livre['idLivre']?>" class="livre">-->
            <a href="index.php?page=livre&idLivre=<?=$livre['idLivre']?>" class="livre">
            <img src="../<?=$livre['imgLivre']?>" width="200" height="300" alt="<?=$livre['titreLivre']?>">
            <span class="name"><?=$livre['titreLivre']?></span>
            <span class="price">
                &euro;<?=$livre['prixLivre']?>
            </span>
        </a>
        <?php endforeach; ?>
    </div>
</div>