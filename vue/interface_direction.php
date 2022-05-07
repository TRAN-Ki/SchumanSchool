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

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

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
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">Experience</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#education">Education</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#skills">Classe</a></li>
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
            if (isset($_SESSION['id'])){
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
    <!-- Experience-->
    <section class="resume-section" id="experience">
        <div class="resume-section-content">
            <h2 class="mb-5">Experience</h2>
            <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                <div class="flex-grow-1">
                    <h3 class="mb-0">Senior Web Developer</h3>
                    <div class="subheading mb-3">Intelitec Solutions</div>
                    <p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring.</p>
                </div>
                <div class="flex-shrink-0"><span class="text-primary">March 2013 - Present</span></div>
            </div>
            <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                <div class="flex-grow-1">
                    <h3 class="mb-0">Web Developer</h3>
                    <div class="subheading mb-3">Intelitec Solutions</div>
                    <p>Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.</p>
                </div>
                <div class="flex-shrink-0"><span class="text-primary">December 2011 - March 2013</span></div>
            </div>
            <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                <div class="flex-grow-1">
                    <h3 class="mb-0">Junior Web Designer</h3>
                    <div class="subheading mb-3">Shout! Media Productions</div>
                    <p>Podcasting operational change management inside of workflows to establish a framework. Taking seamless key performance indicators offline to maximise the long tail. Keeping your eye on the ball while performing a deep dive on the start-up mentality to derive convergence on cross-platform integration.</p>
                </div>
                <div class="flex-shrink-0"><span class="text-primary">July 2010 - December 2011</span></div>
            </div>
            <div class="d-flex flex-column flex-md-row justify-content-between">
                <div class="flex-grow-1">
                    <h3 class="mb-0">Web Design Intern</h3>
                    <div class="subheading mb-3">Shout! Media Productions</div>
                    <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.</p>
                </div>
                <div class="flex-shrink-0"><span class="text-primary">September 2008 - June 2010</span></div>
            </div>
        </div>
    </section>
    <hr class="m-0" />
    <!-- Education-->
    <section class="resume-section" id="education">
        <div class="resume-section-content">
            <h2 class="mb-5">Education</h2>
            <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                <div class="flex-grow-1">
                    <h3 class="mb-0">University of Colorado Boulder</h3>
                    <div class="subheading mb-3">Bachelor of Science</div>
                    <div>Computer Science - Web Development Track</div>
                    <p>GPA: 3.23</p>
                </div>
                <div class="flex-shrink-0"><span class="text-primary">August 2006 - May 2010</span></div>
            </div>
            <div class="d-flex flex-column flex-md-row justify-content-between">
                <div class="flex-grow-1">
                    <h3 class="mb-0">James Buchanan High School</h3>
                    <div class="subheading mb-3">Technology Magnet Program</div>
                    <p>GPA: 3.56</p>
                </div>
                <div class="flex-shrink-0"><span class="text-primary">August 2002 - May 2006</span></div>
            </div>
        </div>
    </section>
    <hr class="m-0" />
    <!-- Skills-->
    <section class="resume-section" id="skills">
        <div class="resume-section-content">
            <?php
            require_once "../src/bdd/Bdd.php";
            $database = new Bdd();
            $req = $database->connexion()->prepare('SELECT * FROM etudiant ORDER BY ref_classe;');
            $req->execute();
            $res = $req->fetchAll();
            ?>
            <h2 class="mb-5">Classe</h2>
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
    <!-- Interests-->
    <?php
    require_once "../src/bdd/Bdd.php";
    $bdd = new Bdd();
    $req = $bdd->connexion()->prepare('SELECT * FROM devoir INNER JOIN etudiant ON devoir.ref_classe = etudiant.ref_classe WHERE etudiant.id_etudiant='.$_SESSION["id"].' ');
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
<script type="text/javascript">
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );</script>
</body>
</html>
