<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require '../../models/Human.php';


require '../../models/Auteur.php';
require '../../models/User.php';
require '../../models/Admin.php';

session_start();

$mail = $_SESSION['user']->getMail();
$nom = $_SESSION['user']->getNom();
$prenom = $_SESSION['user']->getPrenom();
$statut = $_SESSION['user']->getStatut();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Platinium</title>
    <!-- Latest compiled and minified CSS -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    Navigation
                </a>
            </div>
            <div class="navbar-collapse collapse" id="menu">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="home.php">Home</a>
                    </li>
                    <li>
                        <a href="list_theme.php">Thème</a>
                    </li>
                    <lik>
                        <a href="articles.php">Articles</a>
                    </lik>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-offset-3">
                <div class="form-profil">
                    <h4>Profil</h4>
                    <div class="row profil">
                        <?php
                        echo '<div> Prenom : ' . htmlentities($prenom) . '</div>
                          <div>Nom :     ' . htmlentities($nom) . '</div>
                          <div>Email :   ' . htmlentities($mail) . '</div>
                          <div>Statut :  ' . htmlentities($statut) . '</div>';
                        ?>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
</body>
</html>
