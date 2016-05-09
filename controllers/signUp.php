<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

/*Page d'inscription*/
/*Les fichiers qu'on inclut*/
require '../models/Database.php';


/*Connexion à la base*/
connect($db);

/*On prépare la requête*/
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];
$date = date("d-m-Y");
$statut = 'abonne';
/*On hash le mdp*/
$mdp = $_POST['mdp'] . crypt($_POST['mdp'], CRYPT_BLOWFISH);
$mdp = hash('md5', $mdp);
$confmdp = $_POST['confmdp'] . crypt($_POST['confmdp'], CRYPT_BLOWFISH);
$confmdp = hash('md5', $confmdp);


/*On vérifie que les champs du formulaire envoyé ont tous été remplis*/
if (!empty($nom) && !empty($prenom) && !empty($mail) && !empty($mdp) && !empty($confmdp)) {

    /*Vérification du mail:*/
    $confmail = "@ynov.com";
    $piece = substr($mail, -9);

    /*On vérifie que l'email entré finit bien par @ynov.com*/
    if ($piece != $confmail) {
        echo 'Echec de l\'inscription: Vous n\'avez pas entré un mail finissant par @ynov.com';
        echo '<br>';
        header('../views/pages/signUp.php');
        return false;
    }

    /* On vérifie si il n'existe pas d'utilisateur possédant le même mail*/
    $result = Database::checkSignUp($mail, $db);
    if ($result->compte == 1) {
        echo 'Il existe déjà un utilisateur ayant cet email dans notre base de données';
        echo '<br>';
        header('../views/pages/signUp.php');
    }

    if ($result->compte == 0) {

        /*Vérifie si les champs confirmation mot de passe et mot de passe sont identiques*/
        if ($confmdp == $mdp) {
            /*On insère les valeurs dans la bdd*/
            Database::signUp($db, $mail, $nom, $prenom, $mdp, $date, $statut);
            echo 'Inscription réussite';
            header('../views/index.php');

        } else {

            echo 'Echec de l\'inscription:les champs Mot de passe et Confirmation mot de passe ne sont pas les mêmes.';
            echo '<br>';
            header('../views/pages/signUp.php');

        }
    } else {

        echo 'Echec de l\'inscription: vous avez omis un ou plusieurs champs.';
        echo '<br>';
        header('../views/pages/signUp.php');
        print_r($result->compte);
    }
}