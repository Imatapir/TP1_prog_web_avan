<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("location:livre-index.php");
}
require_once('Classe/CRUD.php');
require_once('Classe/Livre.php');

$livre = new Livre;
$insert = $livre->insert('livre', $_POST);

if($insert){
    header("location:livre-show.php?id=$insert");
}else{
    header("location:livre-index.php");
}