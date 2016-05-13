<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 12/05/2016
 * Time: 13:51
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);
require '../../models/Auteur.php';
require '../../models/Admin.php';
require '../../models/User.php';
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste Articles</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">

    <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu"
                    aria-expanded="false">
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
                    <a href="users.php">Profil</a>
                </li>
                <li>
                    <a href="afficheArticle.php">Articles</a>
                </li>
                <?php

                if ($_SESSION['user']->getStatut() == "auteur") {
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
            <form method="post" action="pageArticle.php">
                <div class="form-profil">
                    <div class="row">
                        <h1>Article</h1>
                        <div class="col-xs-12 col-md-6 col-md-offset-3">
                            <div class="left">
                                <ul>
                                    <?php
                                    connect($db);
                                    $articles = 'SELECT * FROM article ORDER BY id_article';
                                    $stmt = $db->prepare($articles);
                                    $stmt->execute();
                                    $result = $stmt->fetchAll();
                                    $taille = sizeof($result);
                                    for ($i = 0; $i < $taille; $i++) {
                                        echo '<li>' . htmlentities($result[$i]->nom) . '<input type="radio" name="article" value="' . $result[$i]->id_article . '"></li>';
                                    }
                                    ?>
                                    <button class="btn btn-primary btn-md">Valider</button>
                                </ul>
                            </div>
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
