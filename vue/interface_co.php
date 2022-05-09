<!DOCTYPE html>
<?php
require_once "../src/modele/Bloc_heure.php";
session_start();
if (!isset($_SESSION['id_etudiant'])) {
    header('location: ../../index.php');
    exit();
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Resume - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../assets/css/styles.css" rel="stylesheet" />
        <style>


            .divcenter {
                margin-left: 111px;
                margin-right: 111px;
                width: 100px;
            }
            .divcentertext {
                margin-left: 88px;
                margin-right: 88px;
                width: 150px;
            }

            caption /* Titre du tableau */
            {
                margin: auto; /* Centre le titre du tableau */
                font-family: Arial, Times, "Times New Roman", serif;
                font-weight: bold;
                font-size: 1.2em;
                color: #1D809F;
                margin-bottom: 20px; /* Pour éviter que le titre ne soit trop collé au tableau en-dessous */
            }

            table /* Le tableau en lui-même */
            {
                margin-left: auto;
                margin-right: auto; /* Centre le tableau */
                border: 4px outset #1D809F; /* Bordure du tableau avec effet 3D (outset) */
                border-collapse: collapse; /* Colle les bordures entre elles */
                table-layout: fixed;
                width: 100%;
            }
            th /* Les cellules d'en-tête */
            {
                background-color: #1D809F;
                color: white;
                font-size: 1.1em;
                font-family: Arial, "Arial Black", Times, "Times New Roman", serif;
                border:1px solid #DDAE1B;
            }

            td /* Les cellules normales */
            {
                border: 1px solid black;
                font-family: "Comic Sans MS", "Trebuchet MS", Times, "Times New Roman", serif;
                text-align: center; /* Tous les textes des cellules seront centrés*/
                padding: 5px; /* Petite marge intérieure aux cellules pour éviter que le texte touche les bordures */
            }
            td.time
            {
                width:5%;
            }
        </style>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">


                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="../assets/img/default_avatar.png" alt="..." /></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Emploi du temps</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#devoir">Devoirs</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../src/traitement/deco.php">Se déconnecter</a></li>
                </ul>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <!-- About-->
            <section class="resume-section" id="about">
                <div class="resume-section-content">

                    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
                    <script>
                        $(function(){
                            $("#timetable").load("../src/modele/Bloc_heure.php");
                        });
                    </script>

                    <?php

                    if (isset($_SESSION['id_etudiant'])){
                        echo "
                    <h1 class='mb-0'>
                        ".$_SESSION['prenom']." 
                        <span class='text-primary'>".$_SESSION['nom']."</span>
                    </h1>

                    <div class='subheading mb-5'>
                        ".$_SESSION['cp']."·".$_SESSION['rue']."·".$_SESSION['ville']."·".$_SESSION['tel_etudiant']."·
                        <a href='mailto:name@email.com'>".$_SESSION['email']."</a>
                    </div>";
                    }?>
                    <p class="lead mb-5"><b>- ESPACE ÉLÈVE -</b></p>

                    <br><br>

                    <h2 class="mb-5">Emploi du temps</h2>
                    <br>
                    <?php
                    require_once '../src/bdd/Bdd.php';
                    require_once '../src/modele/Bloc_heure.php';
                    $bloc= new Bloc_heure(array());
                    $heure=null;
                    $bdd = new Bdd();
                    $arrJ = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
                    $arrF=array("Lundi" => array() , "Mardi"=> array(), "Mercredi"=> array(), "Jeudi"=> array(), "Vendredi"=> array(), "Samedi"=> array(0), "Dimanche"=> array(0));
                    $arrH=array("Lundi"=> array() , "Mardi"=> array(), "Mercredi"=> array(), "Jeudi"=> array(), "Vendredi"=> array(), "Samedi"=> array(0), "Dimanche"=> array(0));
                    $compteur = array(0,0,0,0,0,0,0);
                    $lcompteur = array(1,1,1,1,1,1,1);
                    $jlenght = array(0,0,0,0,0,0,0);
                    for($k=0;$k<7;$k=$k+1)
                    {
                        $res=$bloc->afficherjour($bdd,$arrJ[$k]);
                        foreach ($res as $val) {
                            $arrH[$arrJ[$k]][] = $val["heure_debut"];
                            $arrF[$arrJ[$k]][] = $val["heure_fin"];
                        }

                    }






                    ?>



                    <table>
                        <?php
                        $jour = array(null, "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");

                        $rdv["Dimanche"]["16h30"]="CEJM";
                        $rdv["Lundi"]["9"]= "Math";
                        $join=$bloc->afficherJoin($bdd);
                        foreach ($join as $v){
                            $rdv[$v["jour"]][str_replace("h30",".5",$v["heure_debut"])]= $v["nom"]." ".$v["libelle"];
                        }
                        echo "<tr><th>Heure</th>";
                        for($x = 1; $x < 8; $x++)
                            echo "<th>".$jour[$x]."</th>";
                        echo "</tr>";
                        $key=0;
                        for($j = 8; $j < 18; $j += 0.5) {

                            $key=$key+1;
                            echo "<tr>";
                            for($i = 0; $i < 7; $i++) {

                                if($i == 0) {
                                    $heure = str_replace(".5", "h30", $j);
                                    echo "<td class=\"time\">".$heure."</td>";

                                }
                                $valeur=null;
                                unset($valeur);
                                $valeur=$bloc->afficherheure($bdd,$j,$jour[$i+1]);
                                if(isset($valeur['id_bloc_heure'])){
                                    $jlenght[$i]=(str_replace("h30",".5",$valeur["heure_fin"])-$j)*2+1;

                                    echo "<td rowspan=$jlenght[$i]>";

                                }
                                elseif((double)$j<=(double)str_replace("h30",".5",$arrF[$arrJ[$i]][$compteur[$i]]) && $jour[$i+1]==$arrJ[$i]
                                    && (double)$j>=(double)str_replace("h30",".5",$arrH[$arrJ[$i]][$compteur[$i]])){
                                    $lcompteur[$i]=$lcompteur[$i]+1;
                                    if($compteur[$i]+1<sizeof($arrF[$arrJ[$i]]) && $lcompteur[$i]==$jlenght[$i]){
                                        $lcompteur[$i]=1;
                                        $compteur[$i]=$compteur[$i]+1;
                                    }

                                }

                                else{
                                    echo "<td>";
                                }

                                if(isset($rdv[$jour[$i+1]][$heure])) {
                                    echo $rdv[$jour[$i+1]][$heure];
                                }
                                echo "</td>";
                            }
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
            </section>
            <hr class="m-0" />

            <!-- Interests-->
            <?php
            require_once "../src/bdd/Bdd.php";
            $bdd = new Bdd();
            $req = $bdd->connexion()->prepare('SELECT * FROM devoir INNER JOIN etudiant ON devoir.ref_classe = etudiant.ref_classe WHERE etudiant.id_etudiant='.$_SESSION["id_etudiant"].' ');
            $req->execute();
            $res1 = $req->fetchall();
            ?>
            <section class="resume-section" id="devoir">
                <div class="resume-section-content">
                    <h2 class="mb-5">Devoirs</h2>
                    <?php
                    foreach ($res1 as $val){
                        $date=date_create($val["date_debut"]);
                        $date1=date_create($val["date_fin"]);
                        setlocale(LC_TIME, "fr_FR", "French");
                        echo ' 
                                <div class="ed-card with-epingle cliquable devoiravenir boite-devoirs ng-star-inserted">
                        <h3 class="date">'.strftime("%A %d %B %G", strtotime(DATE_FORMAT($date1 , "l F Y" ))).'</h3>

                        <div><p class="ng-star-inserted">
                                <span class="subject"> '.$val["libelle"].' <!----></span>
                                 <br>
                                <span  class="pull-right ng-star-inserted">Donné le '.strftime("%A %d %B %G", strtotime(DATE_FORMAT($date , "l F Y" ))).' --- Description   : '.$val["description"].'</span><!----></p><!---->
                        </div>
                    </div>
                            ';
                    }
                    ?>
                </div>
            </section>
            <hr class="m-0" />
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../assets/js/scripts.js"></script>
    </body>
</html>
