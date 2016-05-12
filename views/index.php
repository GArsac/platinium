<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
   require '../vendor/autoload.php';
   $router = new AltoRouter();
$router->setBasePath('/Platinium');
$router->map('GET', '/', function(){
    require_once 'index.php'; // ACTION DU CONTROLLERS
});
$router->map('POST', '/inscription', function(){
    $user = new Users();
    $user->inscription();
});

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
    <link rel="stylesheet" href="/views/css/main.css">
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
            <a class="navbar-brand" href="index.php">
                <img style="height: 35px; width: 45px;" src="http://www.icone-png.com/png/13/12594.png">
            </a>
        </div>

        <div class="navbar-collapse collapse" id="menu">
            <ul class="nav navbar-nav">

            </ul>

        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <div class="form-login">
                <h4>Time to Connect!!</h4>
                <form method="post" action="../controllers/sign.php">
                    <input type="email" required name="mail" id="userName" class="form-control input-sm chat-input"
                           placeholder="Email"/>
                    <input type="password" required name="mdp" class="form-control input-sm chat-input"
                           placeholder="Password"/>
                    <br>
                    <button type="submit" class="btn btn-primary btn-md" name="value" value="1">Login</button>
                </form>
                <a href="../views/pages/signUp.php">Pas encore inscrit?</a>
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
