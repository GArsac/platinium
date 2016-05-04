<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
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

<form method="post" action="../../controllers/signUp.php">
    <div id="warning">

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

        <button type="submit" class="center btn btn-primary btn-md" >Inscription</button>
    </div>
</form>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>