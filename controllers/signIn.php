<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require '../models/connect.php';
require '../models/request.php';

/*Connexion à la bdd*/
connect($db);
/*On récupère les valeurs entrés par l'utilisateur*/
$mail = $_POST['mail'];
/*On hash le mdp entré par l'utilisateur*/
$mdp = hash('md5',$_POST['mdp']);
$new_mdp = crypt($mdp,CRYPT_SHA512).$mdp;

if (!empty($mail) && !empty($mdp)) {
    $stmt = $db->prepare($signIn);
    $stmt->bindParam(':mail', $mail, PDO::PARAM_STR, 255);
    $stmt->bindParam(':mdp', $new_mdp, PDO::PARAM_STR, 255);
    $stmt->execute();
    $result = $stmt->fetchAll();
    if ($result->compte == 1 && $result->enabled == 1) {
        session_start();
        header('Location:../views/pages/accueil.php');
    } else {
        echo 'Vous n\'êtes pas autorisé à accéder au service';
    }
} else {
    echo 'Erreur dans la connexion:Le mot de passe ou le login est incorrect.';
}
