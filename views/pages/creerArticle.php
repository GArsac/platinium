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
    <title>Document</title>
    <script src="../../ckeditor/ckeditor.js"></script>
    <script src="../../ckeditor/samples/js/sample.js"></script>
    <!--<link rel="stylesheet" href="../../CKEditor/ckeditor/samples/css/samples.css">
    <link rel="stylesheet" href="../../CKEditor/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">-->
</head>
<body id="main">
<form action="script.php" method="post">
    <input type="text" name="articleName"> Nom de l'article
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
    <button>Poster l'article</button>

</form>
<script>
    initSample();
</script>

</body>
</html>