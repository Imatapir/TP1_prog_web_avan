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
    <title>Auteur Show</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require_once('header.php'); ?>
    <div class="container">
        <h1>Auteur Show</h1>
        <p><strong>Nom: </strong><?= $nom; ?></p>
        <p><strong>Prenom: </strong><?= $prenom; ?></p>
        <a href="auteur-edit.php?id=<?= $id; ?>" class="btn">Edit</a>
        <form action="auteur-delete.php" method="post">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <input type="submit" value="delete" class="btn red">
        </form>
    </div>
</body>
</html>