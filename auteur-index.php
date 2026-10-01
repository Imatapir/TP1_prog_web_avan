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
    <title>Auteurs</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require_once('header.php'); ?>
    <h1>Auteurs</h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Show</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($auteurs as $a){ ?>
            <tr>
                    <td><?= $a['id'] ?></td>
                    <td><a href="auteur-show.php?id=<?= $a['id'] ?>"><?= $a['nom'] ?></a></td>
                    <td><?= $a['prenom'] ?></td>
                    <td><a href="auteur-show.php?id=<?= $a['id'] ?>" class="btn">View</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="auteur-create.php" class="btn">New Auteur</a>
</body>
</html>