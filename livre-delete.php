<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("location:livre-index.php");
    die();
}
require_once('Classe/CRUD.php');
require_once('Classe/Livre.php');

$id = $_POST['id'];
$livre = new Livre;
$delete = $livre->delete('livre', $id);

if($delete){
    header('location:livre-index.php');
}else{
    header('location:ressource-utilisee.php');
}