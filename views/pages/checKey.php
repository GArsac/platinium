<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
require '../../models/Database.php';
session_start();
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Connexion</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
    <h1>Confirmation de la clé</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-5 col-md-3">
                <div class="form-login">

                    <h5>Veuillez entrer le code de la vérification</h5>
                    <form method="post" action="">
                        <input type="text" required name="checkKey" id="userName" class="form-control input-sm chat-input"
                               placeholder="Clé de vérification"/>
                        <br>
                        <button type="submit" class="btn btn-primary btn-md" name="value" value="1">Login</button>
                    </form>
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
$originalKey = Database::checkKey($_SESSION['mail'],$db);
if($_POST['checkKey'] == $originalKey)
{
    Database::enableUser($_SESSION['mail'],$db);
}

?>