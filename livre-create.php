<?php
require_once('Classe/CRUD.php');
require_once('Classe/Auteur.php');

$auteur = new Auteur;
$auteurs = $auteur->select('auteur');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre Create</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require_once('header.php'); ?>

    <div class="container">
        <form action="livre-store.php" method="post">
            <h2>New livre</h2>
            <label>Titre
                <input type="text" name="titre">
            </label>
            <label>Prix
                <input type="text" name="prix">
            </label>
            <label>Stock
                <input type="text" name="stock">
            </label>
            <label>Auteur
                <select name="auteur_id">
                    <?php foreach($auteurs as $a){ ?>
                        <option value="<?= $a['id'] ?>"><?= $a['nom'] ?> <?= $a['prenom'] ?></option>
                    <?php } ?>
                </select>
            </label>
            <input type="submit" class="btn" value="Save"> 
        </form>
    </div>
    
</body>
</html>