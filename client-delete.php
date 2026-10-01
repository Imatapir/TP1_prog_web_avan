<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("location:client-index.php");
}
require_once('Classe/CRUD.php');
require_once('Classe/Client.php');

$id = $_POST['id'];
$client = new Client;
$delete = $client->delete('client', $id);
if($delete){
    header('location:client-index.php');
}else{
    echo "Error";
}