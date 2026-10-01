<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("location:client-index.php");
}
require_once('Classe/CRUD.php');
require_once('Classe/Client.php');


$client = new Client;
$update = $client->update('client', $_POST);
if($update){
    header('location:client-index.php');
}else{
    echo "Error";
}