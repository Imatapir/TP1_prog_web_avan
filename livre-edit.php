<?php
if(!isset($_GET['id']) or $_GET['id']==null){
    header('location:livre-index.php');
    die();
}
$id = $_GET['id'];

require_once('Classe/CRUD.php');
require_once('Classe/Livre.php');
require_once('Classe/Auteur.php');

$livre = new Livre;
$livres = $livre->selectId('livre', $id);

if($livres){
    extract($livres);
}else{
    header('location:livre-index.php');
    die();
}

$auteur = new Auteur;
$auteurs = $auteur->select('auteur');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre Edit</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php require_once('header.php'); ?>
    <div class="container">
        <form action="livre-update.php" method="post">
            <h2>Livre Edit</h2>
            <input type="hidden" name="id" value="<?= $id; ?>">
            <label>Titre
                <input type="text" name="titre" value="<?= $titre; ?>">
            </label>
            <label>Prix
                <input type="text" name="prix" value="<?= $prix; ?>">
            </label>
            <label>Stock
                <input type="text" name="stock" value="<?= $stock; ?>">
            </label>
            <label>Auteur
                <select name="auteur_id">
                    <?php foreach($auteurs as $a){ ?>
                        <option value="<?= $a['id'] ?>" <?= ($a['id'] == $auteur_id) ? 'selected' : '' ?>><?= $a['nom'] ?> <?= $a['prenom'] ?></option>
                    <?php } ?>
                </select>
            </label>
            <input type="submit" class="btn" value="Save"> 
        </form>
    </div>
    
</body>
</html>