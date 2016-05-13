<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require '../../models/Admin.php';
require '../../controllers/Admins.php';
session_start();
connect($db);

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
                        <a href="users.php">Profil</a>
                    </li>
                    <li>
                        <a href="afficheArticle.php">Articles</a>
                    </li>
                    <?php
                    if($_SESSION['user']->getStatut() == "admin"){
                        echo '<li>
                        <a href="list_theme.php">Thème</a>
                    </li>';
                        echo '<li>
                        <a href="addTheme.php">Ajouter un thème</a>
                    </li>';
                    }
                    if ($_SESSION['user']->getStatut() == "auteur"){
                        echo '<li>
                        <a href="creerArticle.php">Poster un Article</a>
                    </li>';
                    }
                    ?>

                </ul>

            </div>
        </div>
    </nav>
    <div class="container">
        <div classe="row">
            <div class="col-md-6 col-md-offset-3 col-xs-12">
                <form method="post" action="">
                    <div class="form-signin">
                        <div class="row">
                            <h4>Liste des thèmes</h4>
                            <div class="col-xs-12">
                                <?php
                                if($_SESSION['user']->getStatut() == "admin"){
                                    Admins::displayTheme($db);
                                    if(isset($_POST['value'])){
                                        Admins::deleteTheme($_POST['value'],$db);
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
</body>
</html>
