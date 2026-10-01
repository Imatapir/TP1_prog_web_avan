<?php
require_once('Classe/CRUD.php');
require_once('Classe/Livre.php');

$livre = new Livre;
$livres = $livre->select('livre');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livres</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require_once('header.php'); ?>

    <h1>Livres</h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Titre</th>
                <th>Prix</th>
                <th>Stock</th>
                <th>Show</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($livres as $l){ ?>
               <tr>
                    <td><?= $l['id'] ?></td>
                    <td><a href="livre-show.php?id=<?= $l['id'] ?>"><?= $l['titre'] ?></a></td>
                    <td><?= $l['prix'] ?></td>
                    <td><?= $l['stock'] ?></td>
                    <td><a href="livre-show.php?id=<?= $l['id'] ?>" class="btn">View</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="livre-create.php" class="btn">New Livre</a>
</body>
</html>