<?php
require '../vendor/autoload.php';
require './Classes/Trajet.php';
require './Classes/Passenger.php';
require './fonctions.php';

if (!empty($_POST)) {
    direct($_POST);
}
// FONCTIONNEMENT SANS OBJETS

// requete ultra specifique (c'est la seule chose que j'ai dans la bdd)
// $result = select($pdo,"SELECT * FROM trajet WHERE region = :region", [':region' => $_POST['region']]);
// echo json_encode($result);