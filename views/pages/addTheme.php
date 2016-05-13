<?php

require '../../models/Admin.php';
session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
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
                    if ($_SESSION['user']->getStatut() == "admin") {
                        echo '<li>
                                        <a href="list_theme.php">Thème</a>
                                    </li>';
                    }
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
                <form method="post" action="">
                    <div class="form-signin">
                        <div class="row">
                            <h1>Thème:</h1>
                            <div class="col-xs-12 col-md-6 col-md-offset-3">
                                <div class="center">
                                    <input type=" text" name="theme" required placeholder="Entrez le thème de votre choix" class="form-control input-sm chat-input">
                                    <br>
                                    <button type="submit" class="btn btn-primary btn-md" name="value" value="3">Ajouter</button>
                                </div>
                            </div>
                        </div>
                        <?php
                        if (isset($_POST['theme'])) {
                            $_SESSION['user']->addTheme($_POST['theme'], $db);
                        }

                        ?>
                </form>
            </div>

        </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>

</html>

