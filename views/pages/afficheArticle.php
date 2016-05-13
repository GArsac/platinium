<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 12/05/2016
 * Time: 13:51
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);
require '../../models/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="pageArticle.php" method="post">
    <ul>
        <?php
        connect($db);
        $articles = 'SELECT * FROM article ORDER BY id_article';
        $stmt = $db->prepare($articles);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $taille = sizeof($result);

        for ($i=0;$i<$taille;$i++)
        {
            echo '<li>' . htmlentities($result[$i]->nom) . '<input type="radio" name="article" value="' . $result[$i]->id_article . '"></li>';
        }
        ?>
    </ul>
    <button>Valider</button>
</form>
</body>
</html>