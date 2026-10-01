<?php
if(!isset($_GET['id']) or $_GET['id']==null){
    header('location:commande-index.php');
    die();
}

$id = $_GET['id'];

require_once('Classe/CRUD.php');
require_once('Classe/Commande.php');
require_once('Classe/Client.php');
require_once('Classe/Livre.php');

$commande = new Commande;
$commandeData = $commande->selectId('commande', $id);

if(!$commandeData){
    header('location:commande-index.php');
    die();
}

$client = new Client;
$clientData = $client->selectId('client', $commandeData['client_id']);

$lignes = $commande->selectWhere('commande_livre', 'commande_id', $id);

$livre = new Livre;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande Show</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require_once('header.php'); ?>
    <div class="container">
        <h1>Commande Show</h1>
        <p><strong>Client: </strong><?= $clientData['name']; ?></p>
        <p><strong>Date: </strong><?= $commandeData['date_commande']; ?></p>

        <h3>Livres commandes</h3>
        <table>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Quantite</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lignes as $ligne){ ?>
                    <?php $livreData = $livre->selectId('livre', $ligne['livre_id']); ?>
                    <tr>
                        <td><?= $livreData['titre'] ?></td>
                        <td><?= $ligne['quantite'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <form action="commande-delete.php" method="post">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <input type="submit" value="delete" class="btn red">
        </form>
    </div>
</body>
</html>