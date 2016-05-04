<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

/*Page d'inscription*/
/*Les fichiers qu'on inclut*/
require '../models/request.php';
require '../models/connect.php';

/*Connexion à la base*/
connect($db);

/*On prépare la requête*/
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];
$date = date("d-m-Y");
$statut = 'abonne';
/*On hash le mdp*/
$mdp = hash('md5', $_POST['mdp']);
$confmdp = hash('md5', $_POST['confmdp']);

/*On utilise un salt pour le rendre indéchiffrable*/
$new_mdp = crypt($mdp, CRYPT_SHA512) . $mdp;
$new_confmdp = crypt($confmdp, CRYPT_SHA512) . $confmdp;

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
    $stmt = $db->prepare($checkSignUp);
    $stmt->bindParam(':mail', $mail, PDO::PARAM_STR, 255);
    $stmt->execute();
    $result = $stmt->fetch();
    
    if ($result->compte == 1) {
        echo 'Il existe déjà un utilisateur ayant cet email dans notre base de données';
        echo '<br>';
        header('../views/pages/signUp.php');
    }
    
    if ($result->compte == 0) {
        
        /*Vérifie si les champs confirmation mot de passe et mot de passe sont identiques*/
        if ($confmdp == $mdp) {
            
            /*Préparation de la requête sql*/
            $stmt = $db->prepare($signUp);

            /*On lie nos variables à nos paramétres entrés dans la requête*/
            $stmt->bindParam(':mail', $mail, PDO::PARAM_STR, 255);
            $stmt->bindParam(':nom', $nom, PDO::PARAM_STR, 255);
            $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR, 255);
            $stmt->bindParam(':mdp', $new_mdp, PDO::PARAM_STR, 255);
            $stmt->bindParam(':date',$date,PDO::PARAM_INT,55);
            $stmt->bindParam(':statut',$statut,PDO::PARAM_STR,255);

            /*Lancement de la requête SQL*/
            $stmt->execute();
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
    }
}