<<<<<<< HEAD
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require '../../controllers/Humans.php';
require '../../models/Human.php';
require '../../models/User.php';
require '../../models/Admin.php';
require '../../models/Auteur.php';
session_save_path('/tmp/');
session_start();
?>
=======
>>>>>>> 2919e8b04c323ea719b30090fc1ca9b25b2b1d3c
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
<<<<<<< HEAD
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <div classe="row">
            <div class="col-md-6 col-md-offset-3 col-xs-12">
                <form method="post" action="">
                    <div class="form-signin">
                        <h4>Inscription</h4>
                        <p>
                            Nom:
                            <br>
                            <input type="text" name="nom" required placeholder="Nom" class="form-control input-sm chat-input">
                        </p>
                        <p>
                            Prénom:
                            <br>
                            <input type="text" name="prenom" required placeholder="Prénom" class="form-control input-sm chat-input">
                        </p>

                        <p>
                            Adresse mail:
                            <br>
                            <input type="text" name="mail" required placeholder="Veuillez entrez un mail finissant par @ynov.com " class="form-control input-sm chat-input">
                        </p>
                        <p>
                            Mot de passe:
                            <br>
                            <input type="password" name="mdp" required placeholder="Mot de passe"
                                   class="form-control input-sm chat-input">
                        </p>

                        <p>
                            Confirmation mot de passe:
                            <br>
                            <input type="password" name="confmdp" required placeholder="Retapez votre mot de passe"
                                   class="form-control input-sm chat-input">
                        </p>
                        <div class="center">
                            <button type="submit" class="btn btn-primary btn-md" name="valu" value="2">Inscription</button>
                        </div>

                    </div>
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
<?php
connect($db);
Humans::signUp($_POST['mail'],$_POST['mdp'],$_POST['confmdp'],$_POST['nom'],$_POST['prenom'] ,$db );
?>
=======
    <link rel="stylesheet" href="../css/main.css">
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
            <a class="navbar-brand" href="../index.html">
                <img style="height: 35px; width: 45px;" src="http://www.icone-png.com/png/13/12594.png">
            </a>
        </div>

        <div class="navbar-collapse collapse" id="menu">
            <ul class="nav navbar-nav">

            </ul>
        </div>
    </div>
</nav>

<form method="post" action="../../controllers/sign.php">
    <p>
        Nom:
        <br>
        <input type="text" name="nom" required placeholder="Nom" class="form-control input-sm chat-input">
    </p>
    <p>
        Prénom:
        <br>
        <input type="text" name="prenom" required placeholder="Prénom" class="form-control input-sm chat-input">
    </p>

    <p>
        Adresse mail:
        <br>
        <input type="text" name="mail" required placeholder="Veuillez entrez un mail finissant par @ynov.com " class="form-control input-sm chat-input">
    </p>
    <p>
        Mot de passe:
        <br>
        <input type="password" name="mdp" required placeholder="Mot de passe"
               class="form-control input-sm chat-input">
    </p>

    <p>
        Confirmation mot de passe:
        <br>
        <input type="password" name="confmdp" required placeholder="Retapez votre mot de passe"
               class="form-control input-sm chat-input">
    </p>

    <button type="submit" class="center btn btn-primary btn-md" name="valu" value="2">Inscription</button>
</form>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
>>>>>>> 2919e8b04c323ea719b30090fc1ca9b25b2b1d3c
