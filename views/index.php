<?php

require '../controllers/Humans.php';
require '../models/User.php';
require '../models/Admin.php';
require '../models/Auteur.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Platinium</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">


    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <div class="container">
        <div class="col-xs-12">
            <h1 class="titre">Connexion</h1>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-xs-12">
                        <div class="col-xs-12">
                            <div class="form-login">
                                <h4>Vos identifiants</h4>
                                <form method="post" action="">
                                    <input type="email" required name="mail" id="userName" class="form-control input-sm chat-input"
                                        placeholder="Email"/>
                                    <input type="password" required name="mdp" class="form-control input-sm chat-input"
                                        placeholder="Password"/>
                                    <br>
                                    <div class="center">
                                        <button type="submit" class="btn btn-primary btn-md" name="value" value="1">Login</button>

                                    </div>
                                    <div class="center">
                                        <a href="../views/pages/signUp.php">Pas encore inscrit?</a>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

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

Humans::signIn($_POST['mail'], $_POST['mdp'], $db);
?>