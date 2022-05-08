<?php
require_once "../modele/Professeur.php";
require_once "../bdd/Bdd.php";
session_start();
$database = new Bdd();
$insert = new Professeur(array(
    "IdProfesseur"=>$_POST['id_professeur'],
));
$insert->deleteProfesseur($database);

