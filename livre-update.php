<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("location:livre-index.php");
}
require_once('Classe/CRUD.php');
require_once('Classe/Livre.php');


$livre = new Livre;
$update = $livre->update('livre', $_POST);
if($update){
    header('location:livre-index.php');
}else{
    echo "Error";
}