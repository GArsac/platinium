<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 11/05/2016
 * Time: 10:44
 */
require '../../models/Auteur.php';
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un article</title>
    <script src="../../ckeditor/ckeditor.js"></script>
    <script src="../../ckeditor/samples/js/sample.js"></script>
    <!--<link rel="stylesheet" href="../../CKEditor/ckeditor/samples/css/samples.css">
    <link rel="stylesheet" href="../../CKEditor/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body id="main">
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
                ?>
            </ul>
        </div>
    </div>
</nav>
<form action="script.php" method="post">
    <h1>Titre de l'article</h1>
    <h3>Nom de l'article</h3>
    <input type="text" name="articleName">
    <br>
    <h3>Catégorie de l'article</h3>
    <select name="theme">
        <?php
        connect($db);
        $signIn2 = 'SELECT * FROM thematique ORDER BY id_theme';
        $stmt = $db->prepare($signIn2);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $taille = sizeof($result);
        for ($i = 0; $i < $taille; $i++) {
            echo '<option value="' . $result[$i]->id_theme . '">' . $result[$i]->nom . '</option>';
        }
        ?>
    </select>
    <main>
        <div class="adjoined-bottom">
            <div class="grid-container">
                <div class="grid-width-100">
                    <textarea name="texte" id="editor" cols="30" rows="10"></textarea>
                </div>
            </div>
        </div>
    </main>

    <form method="POST" action="../../controllers/Upload.php" enctype="multipart/form-data">
        <!-- On limite le fichier à 10000Ko -->
        <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
        Fichier : <input type="file"  name="avatar">
        <br>
        <div class="center">
            <button class="btn btn-primary btn-md">Poster l'article</button>
        </div>
    </form>
</form>
<script>
    initSample();
</script>

</body>
</html>