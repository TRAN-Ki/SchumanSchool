<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['id_etudiant'])) {
    header('location: vue/interface_co.php');
}
if (isset($_SESSION['id_direction'])) {
    header('location: vue/interface_direction.php');
}
if (isset($_SESSION['id_professeur'])) {
    header('location: vue/interface_professeur.php');
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="assets/css/home.css">
    <link href='https://css.gg/menu-hotdog.css' rel='stylesheet'>
    <style>
        .stage {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            padding: 2rem 0;
            margin: 0 -5%;
            overflow: hidden;
        }
    </style>
</head>
<body>

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <p><b>Connexion.</b></p>
    <a href="vue/login_eleve.php">Élève</a>
    <a href="vue/login_professeur.php">Professeur</a>
    <a href="vue/login_direction.php">Direction</a>
</div>

<div id="main">
    <span style="font-size:30px;cursor:pointer" onclick="openNav()"><i class="gg-menu-hotdog"></i></span>
</div>
<section class="mainpage">
    <h1>Intranet, Lycée Robert Schuman</h1>



    <div class="col-3">
        <div class="stage">
            <div class="dot-typing"></div>
        </div>
    </div>

    <h2>Bienvenue, clique en haut à gauche pour vous connecter.</h2>
    <h6><i>Talal BENZEKKI & Killian TRAN</i></h6>
</section>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
        document.body.style.backgroundColor = "#92a6cb";
    }
</script>

</body>
</html>
