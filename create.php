<?php
include 'classes/client.class.php';
include 'create.phtml';
if(!empty($_POST)){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $dateN = $_POST['dateN'];
    $adress = $_POST['adresse'];
    $tel = $_POST['tel'];
  $client = new Client();
  $client->addNewClient($nom, $prenom, $dateN, $adress, $tel);
}