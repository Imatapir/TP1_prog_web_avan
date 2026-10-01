<?php
session_start();
require_once('Classe/CRUD.php');
require_once('Classe/Client.php');
require_once('Classe/Livre.php');

if(!isset($_SESSION['panier'])){
    $_SESSION['panier'] = array();
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ajouter'])){
    $_SESSION['panier'][] = array(
        'livre_id' => $_POST['livre_id'],
        'quantite' => $_POST['quantite']
    );
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['vider'])){
    $_SESSION['panier'] = array();
}

$client = new Client;
$clients = $client->select('client');

$livre = new Livre;
$livres = $livre->select('livre');

function trouverTitre($livres, $id){
    foreach($livres as $l){
        if($l['id'] == $id){
            return $l['titre'];
        }
    }
    return 'Inconnu';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande Create</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require_once('header.php'); ?>
    <div class="container">

        <h2>Panier</h2>
        <table>
            <thead>
                <tr>
                    <th>Livre</th>
                    <th>Quantite</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($_SESSION['panier'] as $item){ ?>
                    <tr>
                        <td><?= trouverTitre($livres, $item['livre_id']) ?></td>
                        <td><?= $item['quantite'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <form action="commande-create.php" method="post">
            <input type="submit" name="vider" class="btn red" value="Vider le panier">
        </form>

        <h3>Ajouter un livre au panier</h3>
        <form action="commande-create.php" method="post">
            <label>Livre
                <select name="livre_id">
                    <?php foreach($livres as $l){ ?>
                        <option value="<?= $l['id'] ?>"><?= $l['titre'] ?> (<?= $l['prix'] ?>$)</option>
                    <?php } ?>
                </select>
            </label>
            <label>Quantite
                <input type="number" name="quantite" value="1" min="1">
            </label>
            <input type="submit" name="ajouter" class="btn" value="Ajouter au panier">
        </form>

        <h3>Confirmer la commande</h3>
        <form action="commande-store.php" method="post">
            <label>Client
                <select name="client_id">
                    <?php foreach($clients as $c){ ?>
                        <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
                    <?php } ?>
                </select>
            </label>
            <input type="submit" class="btn" value="Confirmer la commande">
        </form>
    </div>
</body>
</html>