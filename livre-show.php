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
$auteurData = $auteur->selectId('auteur', $auteur_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre Show</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require_once('header.php'); ?>
    <div class="container">
        <h1>Livre Show</h1>
        <p><strong>Titre: </strong><?= $titre; ?></p>
        <p><strong>Prix: </strong><?= $prix; ?></p>
        <p><strong>Stock: </strong><?= $stock; ?></p>
        <p><strong>Auteur: </strong><?= $auteurData['nom']; ?>, <?= $auteurData['prenom']; ?></p>
        <a href="livre-edit.php?id=<?= $id; ?>" class="btn">Edit</a>
        <form action="livre-delete.php" method="post">
            <input type="hidden" name="id" value="<?=  $id;?>">
            <input type="submit" value="delete" class="btn red">
        </form>
    </div>
</body>
</html>