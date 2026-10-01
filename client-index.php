<?php
require_once('Classe/CRUD.php');
require_once('Classe/Client.php');

$client = new Client;
$clients = $client->select('client', 'name', 'desc');

// echo "<pre>";
// var_dump($clients);
// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require_once('header.php'); ?>
    <h1>Client List</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>ZipCode</th>
                <th>email</th>
                <th>Phone</th>
                <th>Show</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($clients as $c){
            ?>
            <tr>
                <td><a href="client-show.php?id=<?= $c['id']; ?>"><?= $c['name']; ?></a></td>
                <td><?= $c['address']; ?></td>
                <td><?= $c['zip_code']; ?></td>
                <td><?= $c['email']; ?></td>
                <td><?= $c['phone']; ?></td>
                <td><a href="client-show.php?id=<?= $c['id']; ?>" class="btn">View</a></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
   
    <a href="client-create.php" class="btn">New Client</a>
</body>
</html>