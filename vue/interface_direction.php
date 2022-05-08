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
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#professeur">Professeur</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#education">Education</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#classe">Classe</a></li>
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
    <section class="resume-section" id="professeur">
        <div class="resume-section-content">
            <?php
            require_once "../src/bdd/Bdd.php";
            $database = new Bdd();
            $req = $database->connexion()->prepare('SELECT * FROM professeur;');
            $req->execute();
            $res = $req->fetchAll();
            ?>
            <h2 class="mb-5">Professeur</h2>
            <table id="table_id" class="table table-bordered display">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <td>Modifier professeur</td>
                    <td>Supprimer professeur</td>
                </tr>
                </thead>
                <tbody>
                <?php
                if (!(isset($res['0']['id_professeur']))){
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
                                            <td>".$val['tel_portable']."</td>
                                            <td>
                                            <form action='modif_professeur.php' method='post'>
                                                    <input alt='Bouton modifier' type='image' src='../assets/img/update_logo.png' height='20'>
                                                    <input hidden type='text' name='id_professeur' value='".$val['id_professeur']."'>
                                                </form>
                                            </td>
                                            <td>
                                                <form action='../src/traitement/delete_professeur.php' method='post'>
                                                    <input alt='Bouton supprimer' type='image' src='../assets/img/delete_logo.png' height='20'>
                                                    <input hidden type='text' name='id_professeur' value='" . $val['id_professeur'] . "'>
                                                </form>
                                            </td>
                                        </tr>
                                    ";
                    }
                }
                ?>
                </tbody>
            </table>
    </section>
    <hr class="m-0" />
    <!-- Education-->
    <section class="resume-section" id="education">
        <div class="resume-section-content">
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-lg-6">
                    <form action="../src/traitement/add_professeur.php" method="post">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="nom" type="text" placeholder="nom" required data-sb-validations="required" name="nom" />
                            <label for="nom">nom</label>
                            <div class="invalid-feedback" data-sb-feedback="nom:required">Un nom est demander</div>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="prenom" type="text" placeholder="prenom" required data-sb-validations="required" name="prenom" />
                            <label for="prenom">prenom</label>
                            <div class="invalid-feedback" data-sb-feedback="prenom:required">Un prenom est demander</div>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" type="email" placeholder="email" required data-sb-validations="required" name="email" />
                            <label for="email">email</label>
                            <div class="invalid-feedback" data-sb-feedback="email:required">Un email est demander</div>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="mot_de_passe" type="text" placeholder="mot_de_passe" required data-sb-validations="required" name="mot_de_passe" />
                            <label for="mot_de_passe">Mot de passe</label>
                            <div class="invalid-feedback" data-sb-feedback="mot_de_passe:required">Un mot de passe est demander</div>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="tel_portable" type="number" placeholder="tel_portable" required data-sb-validations="required" name="tel_portable" />
                            <label for="tel_portable">telephone</label>
                            <div class="invalid-feedback" data-sb-feedback="tel_portable:required">Un numero de telephone est demander</div>
                        </div>
                        <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                        <div class="d-grid"><button class="btn btn-primary btn-xl " id="submitButton" type="submit">Ajouter un professeur</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <hr class="m-0" />
    <!-- Skills-->
    <section class="resume-section" id="classe">
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
                    <th>Supprimer</th>
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
                                            <td>
                                                <form action='../src/traitement/delete_eleve.php' method='post'>
                                                    <input alt='Bouton supprimer' type='image' src='../assets/img/delete_logo.png' height='20'>
                                                    <input hidden type='text' name='id_etudiant' value='" . $val['id_etudiant'] . "'>
                                                </form>
                                            </td>
                                        </tr>
                                    ";
                    }
                }
                ?>
                </tbody>
            </table>
    </section>
    <div class="resume-section-content">
        <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
            <div class="col-lg-6">
                <form action="../src/traitement/add_etudiant.php" method="post">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="nom" type="text" placeholder="nom" required data-sb-validations="required" name="nom" />
                        <label for="nom">nom</label>
                        <div class="invalid-feedback" data-sb-feedback="nom:required">Un nom est demander</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="prenom" type="text" placeholder="prenom" required data-sb-validations="required" name="prenom" />
                        <label for="prenom">prenom</label>
                        <div class="invalid-feedback" data-sb-feedback="prenom:required">Un prenom est demander</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" type="email" placeholder="email" required data-sb-validations="required" name="email" />
                        <label for="email">email</label>
                        <div class="invalid-feedback" data-sb-feedback="email:required">Un email est demander</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="mot_de_passe" type="text" placeholder="mot_de_passe" required data-sb-validations="required" name="mot_de_passe" />
                        <label for="mot_de_passe">Mot de passe</label>
                        <div class="invalid-feedback" data-sb-feedback="mot_de_passe:required">Un mot de passe est demander</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="rue" type="text" placeholder="rue" required data-sb-validations="required" name="rue" />
                        <label for="rue">rue</label>
                        <div class="invalid-feedback" data-sb-feedback="rue:required">Une rue est demander</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="ville" type="text" placeholder="ville" required data-sb-validations="required" name="ville" />
                        <label for="ville">ville</label>
                        <div class="invalid-feedback" data-sb-feedback="ville:required">Une ville est demander</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="cp" type="number" placeholder="cp" required data-sb-validations="required" name="cp" />
                        <label for="cp">cp</label>
                        <div class="invalid-feedback" data-sb-feedback="cp:required">Un cp est demander</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="tel_etudiant" type="number" placeholder="tel_etudiant" required data-sb-validations="required" name="tel_etudiant" />
                        <label for="tel_etudiant">TelEtudiant</label>
                        <div class="invalid-feedback" data-sb-feedback="tel_etudiant:required">Un numero de telephone est demander</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="tel_resp_legal" type="number" placeholder="tel_resp_legal" required data-sb-validations="required" name="tel_resp_legal" />
                        <label for="tel_resp_legal">TelRespLegal</label>
                        <div class="invalid-feedback" data-sb-feedback="tel_resp_legal:required">Un numero de telephone est demander</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="ref_classe" type="number" placeholder="ref_classe" required data-sb-validations="required" name="ref_classe" />
                        <label for="ref_classe">Classe</label>
                        <div class="invalid-feedback" data-sb-feedback="ref_classe:required">Une classe est demander</div>
                    </div>
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                    <div class="d-grid"><button class="btn btn-primary btn-xl " id="submitButton" type="submit">Ajouter un professeur</button></div>
                </form>
            </div>
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
