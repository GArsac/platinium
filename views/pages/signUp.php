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
    <div class="container">
        <dvi classe="row">
            <div class="col-md-6 col-md-offset-3 col-xs-12">
                <form method="post" action="../../controllers/sign.php">
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