<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("location:auteur-index.php");
}
require_once('Classe/CRUD.php');
require_once('Classe/Auteur.php');

$auteur = new Auteur;
$insert = $auteur->insert('auteur', $_POST);

if($insert){
    header("location:auteur-index.php");
}else{
    echo "Error";
}