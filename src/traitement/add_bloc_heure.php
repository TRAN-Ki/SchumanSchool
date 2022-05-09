<?php
//ajout d'heure de cours
require_once "../modele/Bloc_heure.php";
require_once "../bdd/Bdd.php";
session_start();
$database = new Bdd();
$insert = new Bloc_heure(array(
    'Jour' => $_POST['jour'],
    'HeureDebut' => $_POST['heure_debut'],
    'HeureFin' => $_POST['heure_fin'],
    'RefProfesseur' => $_POST['ref_professeur'],
    'RefClasse' => $_POST['ref_classe'],
    'RefMatiere' => $_POST['ref_matiere']
));
$insert->addBlocHeure($database);
header('Location: ../../vue/interface_direction.php');