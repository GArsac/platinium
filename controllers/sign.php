<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require '../models/Human.php';
require '../models/User.php';
require '../models/Admin.php';
require '../models/Auteur.php';
require '../models/mail.php';
session_start();
/*Connexion à la bdd*/
connect($db);
/*On récupère les valeurs entrés par l'utilisateur*/
$mail = $_POST['mail'];
/*On hash le mdp*/
$mdp = $_POST['mdp'] . crypt($_POST['mdp'], CRYPT_BLOWFISH);
$mdp = hash('md5', $mdp);
/*Valeur du bouton*/
$value = $_POST['value'];
$valu = $_POST['valu'];
/*Inscription*/
if($valu == 2) {
    /*On prépare la requête*/
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $date = date("d-m-Y");
    $statut = 'abonne';
    $confmdp = $_POST['confmdp'] . crypt($_POST['confmdp'], CRYPT_BLOWFISH);
    $confmdp = hash('md5', $confmdp);
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
        if ($result == 1) {
            echo 'Il existe déjà un utilisateur ayant cet email dans notre base de données';
            echo '<br>';
            header('../views/pages/signUp.php');
        }
        if ($result == 0) {
            /*Vérifie si les champs confirmation mot de passe et mot de passe sont identiques*/
            if ($confmdp == $mdp) {
                /*On insère les valeurs dans la bdd*/
                Database::signUp($db, $mail, $nom, $prenom, $mdp, $date, $statut);
                echo 'Inscription réussite';
                $key = randomKey();
                mail_confirmation($mail,$key);
                header('../views/index.php');
            } else {
                echo 'Echec de l\'inscription:les champs Mot de passe et Confirmation mot de passe ne sont pas les mêmes.';
                echo '<br>';
                header('../views/pages/signUp.php');
            }
        }
    }else {
        echo 'Echec de l\'inscription: vous avez omis un ou plusieurs champs.';
        echo '<br>';
        header('../views/pages/signUp.php');
    }
}
/*Connexion*/
if ($value == 1) {
    if (!empty($mail) && !empty($mdp)) {
        $result = Database::checkExistence($mail, $mdp, $db);
        if ($result == 1) {
            $result = Database::connexion($mail, $mdp, $db);
            if ($result->enabled == 1) {

                $_SESSION['user'] = Human::findByCrendential($mail,$mdp,$db);
                header('Location:../views/pages/home.php');
            } elseif ($result->enabled == 0) {
                echo 'Vous n\'êtes pas autorisé à accéder au service';
            }
        } elseif ($result == 0) {
            echo 'Erreur dans la connexion:Le mot de passe ou le login est incorrect.';
        }
    } else {
        echo 'Champs requis non rempli';
    }
}else {
    echo 'Erreur<br>';
    echo $value;
}