<?php
require_once('Classe/CRUD.php');
require_once('Classe/Commande.php');
require_once('Classe/Client.php');

$commande = new Commande;
$commandes = $commande->select('commande');

$client = new Client;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commandes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require_once('header.php'); ?>

    <h1>Commande</h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Client</th>
                <th>Date</th>
                <th>Show</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($commandes as $c){ ?>
            <?php $clientData = $client->selectId('client', $c['client_id']); ?>
            <tr>
                <td><?= $c['id'] ?></td>
                <td><?= $clientData['name'] ?></td>
                <td><?= $c['date_commande'] ?></td>
                <td><a href="commande-show.php?id=<?= $c['id'] ?>" class="btn">View</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="commande-create.php" class="btn">Nouvelle Commande</a>
</body>
</html>