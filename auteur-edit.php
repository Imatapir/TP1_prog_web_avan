<?php
if(!isset($_GET['id']) or $_GET['id']==null){
    header('location:auteur-index.php');
    die();
}
$id = $_GET['id'];

require_once('Classe/CRUD.php');
require_once('Classe/Auteur.php');

$auteur = new Auteur;
$data = $auteur->selectId('auteur', $id);

if($data){
    extract($data);
}else{
    header('location:auteur-index.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auteur Edit</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require_once('header.php'); ?>
    <div class="container">
        <form action="auteur-update.php" method="post">
            <h2>Auteur Edit</h2>
            <input type="hidden" name="id" value="<?= $id; ?>">
            <label>Nom
                <input type="text" name="nom" value="<?= $nom; ?>">
            </label>
            <label>Prenom
                <input type="text" name="prenom" value="<?= $prenom; ?>">
            </label>
            <input type="submit" class="btn" value="Save"> 
        </form>
    </div>
</body>
</html>