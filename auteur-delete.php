<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("location:auteur-index.php");
    die();
}
require_once('Classe/CRUD.php');
require_once('Classe/Auteur.php');

$id = $_POST['id'];
$auteur = new Auteur;
$delete = $auteur->delete('auteur', $id);

if($delete){
    header('location:auteur-index.php');
}else{
    header('location:ressource-utilisee.php');
}