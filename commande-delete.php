<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("location:commande-index.php");
    die();
}
require_once('Classe/CRUD.php');
require_once('Classe/Commande.php');

$id = $_POST['id'];
$commande = new Commande;

$commande->delete('commande_livre', $id, 'commande_id');

$delete = $commande->delete('commande', $id);
if($delete){
    header('location:commande-index.php');
}else{
    echo "Error";
}