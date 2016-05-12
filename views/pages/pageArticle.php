<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 12/05/2016
 * Time: 14:43
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);
require 'afficheArticle.php';

connect($db);
$article = 'SELECT * FROM article WHERE id_article = :id_article';
$stmt = $db->prepare($article);
$stmt->bindParam(':id_article', $_POST['article'], PDO::PARAM_STR, 255);
$stmt->execute();
$result = $stmt->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
echo '<h1>' . $result->nom . '</h1>';
echo '<p>' . $result->txt . '</p>';

$Num2article = 'SELECT * FROM profil WHERE id_profil = :id_auteur';
$stmt = $db->prepare($Num2article);
$stmt->bindParam(':id_auteur', $result->id_profil, PDO::PARAM_STR, 255);
$stmt->execute();
$resulte = $stmt->fetch();


echo '<p>Article écrit par : ' . $resulte->nom . ' ' . $resulte->prenom. '</p>';
?>
</body>
</html>
