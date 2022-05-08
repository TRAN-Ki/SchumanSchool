<!DOCTYPE html>
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
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#devoir">Devoir</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#awards">Awards</a></li>
                </ul>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <!-- About-->
            <section class="resume-section" id="about">
                <div class="resume-section-content">
                    <?php
                    session_start();
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
                    <p class="lead mb-5">I am experienced in leveraging agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition.</p>
                    <div class="social-icons">
                        <a class="social-icon" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        <a class="social-icon" href="#!"><i class="fab fa-github"></i></a>
                        <a class="social-icon" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="social-icon" href="#!"><i class="fab fa-facebook-f"></i></a>
                    </div>
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
                    <h2 class="mb-5">Devoir</h2>
                    <div class="ed-card with-epingle cliquable devoiravenir boite-devoirs ng-star-inserted">
                        <h3 class="date">lundi 9 mai</h3>

                        <div><p class="ng-star-inserted">
                                <span class="subject"> FRANCAIS <!----></span>
                                <span  class="pull-right ng-star-inserted">Donné le vendredi 22 avril</span><!----></p><!---->
                        </div>
                    </div>
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
                                 
                                <span  class="pull-right ng-star-inserted">Donné le '.strftime("%A %d %B %G", strtotime(DATE_FORMAT($date , "l F Y" ))).'</span><!----></p><!---->
                        </div>
                    </div>
                            ';
                    }
                    ?>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Awards-->
            <section class="resume-section" id="awards">
                <div class="resume-section-content">
                    <h2 class="mb-5">Awards & Certifications</h2>
                    <ul class="fa-ul mb-0">
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                            Google Analytics Certified Developer
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                            Mobile Web Specialist - Google Certification
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                            1
                            <sup>st</sup>
                            Place - University of Colorado Boulder - Emerging Tech Competition 2009
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                            1
                            <sup>st</sup>
                            Place - University of Colorado Boulder - Adobe Creative Jam 2008 (UI Design Category)
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                            2
                            <sup>nd</sup>
                            Place - University of Colorado Boulder - Emerging Tech Competition 2008
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                            1
                            <sup>st</sup>
                            Place - James Buchanan High School - Hackathon 2006
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                            3
                            <sup>rd</sup>
                            Place - James Buchanan High School - Hackathon 2005
                        </li>
                    </ul>
                </div>
            </section>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../assets/js/scripts.js"></script>
    </body>
</html>
