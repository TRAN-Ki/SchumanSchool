<?php
require_once "../modele/Etudiant.php";
require_once "../bdd/Bdd.php";
session_start();
$database = new Bdd();
$insert = new Etudiant(array(
    "IdEtudiant" => $_POST['id_etudiant'],
));
$insert->deleteEtudiant($database);
header('Location: ../../vue/interface_direction.php');