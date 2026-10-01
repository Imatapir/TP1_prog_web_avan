<?php
session_start();

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("location:commande-index.php");
    die();
}

require_once('Classe/CRUD.php');
require_once('Classe/Commande.php');

$commande = new Commande;

$data = array(
    'client_id' => $_POST['client_id'],
    'date_commande' => date('Y-m-d')
);

$insert = $commande->insert('commande', $data);

if($insert){
    if(isset($_SESSION['panier'])){
        foreach($_SESSION['panier'] as $item){
            $ligne = array(
                'commande_id' => $insert,
                'livre_id' => $item['livre_id'],
                'quantite' => $item['quantite']
            );
            $commande->insert('commande_livre', $ligne);
        }
    }

    $_SESSION['panier'] = array();

    header("location:commande-show.php?id=$insert");
}else{
    header("location:commande-index.php");
}