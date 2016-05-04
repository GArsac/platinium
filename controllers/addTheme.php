<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require '../models/connect.php';
require '../models/request.php';

/*Connexion à la bdd*/
connect($db);

$theme = $_POST['theme'];

/*On vérifie si le champs theme de la page*/
if(!empty($theme)){

    $stmt = $db->prepare($checkTheme);
    $stmt->bindParam(':nom', $theme, PDO::PARAM_STR, 255);
    $stmt->execute();
    $result = $stmt->fetch();

    if ($result->compte == 1) {
        echo $theme.' existe déjà.';
        echo '<br>';
        header('../views/pages/signUp.php');
    }
    elseif ($result->compte == 0) {
        /*On prépare la requête*/
        $stmt = $db->prepare($addTheme);
        $stmt->bindParam(':nom', $theme, PDO::PARAM_STR, 255);
        $stmt->execute();
        echo 'Thème ajouté';
        echo '<br>';
    }
}