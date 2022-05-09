<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['id_professeur'])) {
    header('location: ../index.php');
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
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#classe">Élèves</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../src/traitement/deco.php">Se déconnecter</a></li>
                </ul>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <!-- About-->
            <section class="resume-section" id="about">
                <div class="resume-section-content">
                    <?php
                    if (isset($_SESSION['id_professeur'])){
                        echo "
                    <h1 class='mb-0'>
                        ".$_SESSION['prenom']." 
                        <span class='text-primary'>".$_SESSION['nom']."</span>
                    </h1>
                        <a href='mailto:name@email.com'>".$_SESSION['email']."</a>
                    </div>";
                    }?>
                    <p class="lead mb-5"><b>- ESPACE PROFESSEUR -</b></p>

                </div>
            </section>
            <hr class="m-0" />

            <!-- Interests-->
            <section class="resume-section" id="classe">
                <div class="resume-section-content">
                    <?php
                    require_once "../src/bdd/Bdd.php";
                    $database = new Bdd();
                    $req = $database->connexion()->prepare('SELECT * FROM etudiant ORDER BY ref_classe;');
                    $req->execute();
                    $res = $req->fetchAll();
                    ?>
                    <h2 class="mb-5">Mes élèves</h2>
                    <table id="table_id" class="table table-bordered display">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Email</th>
                            <th>Adresse</th>
                            <th>Telephone</th>
                            <th>Classe</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (!(isset($res['0']['id_etudiant']))){
                            echo "<tr>
                                        <td colspan='9' style='text-align: center'>Aucun etudiant</td>
                                    </tr>
                                ";
                        }
                        else {
                            foreach ($res as $val) {


                                echo "<tr style='text-align: center'>
                                            <td>".$val['nom']."</td>
                                            <td>".$val['prenom']."</td>
                                            <td>".$val['email']."</td>
                                            <td>rue ,".$val['rue']." ".$val['cp']." ".$val['ville']."</td>
                                            <td>".$val['tel_etudiant']."</td>
                                            <td>".$val['ref_classe']."</td>
                      
                                        </tr>
                                    ";
                            }
                        }
                        ?>
                        </tbody>
                    </table>
            </section>
            <hr class="m-0" />
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../assets/js/scripts.js"></script>
    </body>
</html>
