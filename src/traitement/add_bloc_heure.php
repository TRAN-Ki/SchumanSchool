<?php
require_once "../modele/Bloc_heure.php";
require_once "../bdd/Bdd.php";
session_start();
$database = new Bdd();
$insert = new Bloc_heure(array(
    //à faire
));
$insert->addBlocHeure($database);
header('Location: ../../vue/interface_direction.php');