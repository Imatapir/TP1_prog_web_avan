<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("location:auteur-index.php");
    die();
}
require_once('Classe/CRUD.php');
require_once('Classe/Auteur.php');

$auteur = new Auteur;
$update = $auteur->update('auteur', $_POST);

if($update){
    header('location:auteur-index.php');
}else{
    echo "Error";
}