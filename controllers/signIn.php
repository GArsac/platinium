<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require '../models/Database.php';
require '../models/Admin.php';
/*Connexion à la bdd*/
connect($db);
/*On récupère les valeurs entrés par l'utilisateur*/
$mail = $_POST['mail'];
/*On hash le mdp*/
$mdp = $_POST['mdp'].crypt($_POST['mdp'],CRYPT_BLOWFISH);
$mdp = hash('md5',$mdp);

if (!empty($mail) && !empty($mdp)) {
    $result = Database::checkExistence($mail,$mdp,$db);

    if ($result->compte == 1) {
        $result = Database::connexion($mail,$mdp,$db);
        if ($result->enabled == 1) {
            session_start();
            if ($result->statut == "admin") {
                $user = new Admin($result->nom,$result->prenom,$result->statut,$mail);
                $_SESSION['user']=$user;
            }

            header('Location:../views/pages/home.php');
        }elseif ($result->enabled == 0) {
            echo 'Vous n\'êtes pas autorisé à accéder au service';
        }
    }elseif($result->compte == 0){
        echo 'Erreur dans la connexion:Le mot de passe ou le login est incorrect.';
    }
} else{
    echo 'Champs requis non rempli';
}
