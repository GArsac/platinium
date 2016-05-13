<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 09/05/16
 * Time: 13:31
 */
require 'connect.php';
class Database
{
    /*Ensemble des requêtes utilisés dans les fichiers du dossier controllers*/
    /*Requête pour l'ajout de theme*/
private $addTheme = 'INSERT INTO thematique SET nom = :nom';
    /*Requête pour la suppression de theme*/
private $deleteTheme = 'DELETE FROM thematique WhERE id_theme = :id';
    /*Requête pour la vérification du theme existante*/
private $checkTheme = 'SELECT COUNT(id_theme) compte FROM thematique WHERE nom = :nom';

    /*Requête pour avoir l'ensemble des thématiques existant sur le site*/
private $allTheme = 'SELECT * FROM thematique';

    /*Requête pour la connexion*/


    /*Vérifie si le login et le mdp entré sont dans la bdd*/
    static function checkExistence($mail,$new_mdp,$db){
        $signIn = 'SELECT COUNT(id_profil) compte FROM profil WHERE mail = :mail AND mdp = :mdp';
        $stmt = $db->prepare($signIn);
        $stmt->bindParam(':mail', $mail, PDO::PARAM_STR, 255);
        $stmt->bindParam(':mdp', $new_mdp, PDO::PARAM_STR, 255);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result->compte;
    }

    /*Retourne la clé associé à l'utilisateur*/
    static function checkKey($mail,$db){
        $key = 'SELECT keyGenerator FROM profil WHERE mail = :mail';
        $stmt = $db->prepare($key);
        $stmt->bindParam(':mail', $mail, PDO::PARAM_STR, 255);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result->keyGenerator;
    }

    /*Autorise l'user à se connecter au site*/
    static function enableUser($mail,$db){
        $enable = 'UPDATE profil SET enabled = 1 WHERE mail = :mail';
        $stmt = $db->prepare($enable);
        $stmt->bindParam(':mail', $mail, PDO::PARAM_STR, 255);
        $stmt->execute();
        header('Location ../views/index.php');
    }

    /*Pour la connexion au site*/
    static function connexion($mail,$new_mdp,$db){
        $signIn2 = 'SELECT * FROM profil WHERE mail = :mail AND mdp = :mdp';
        $stmt = $db->prepare($signIn2);
        $stmt->bindParam(':mail', $mail, PDO::PARAM_STR, 255);
        $stmt->bindParam(':mdp', $new_mdp, PDO::PARAM_STR, 255);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    /*Vérifie si l'email est déjà pris*/
    static function checkSignUp($mail,$db){
        $checkSignUp =  'SELECT COUNT(id_profil) compte FROM profil WHERE mail = :mail';
        $stmt = $db->prepare($checkSignUp);
        $stmt->bindParam(':mail', $mail, PDO::PARAM_STR, 255);
        $stmt->execute();
        $result = $stmt->fetch();
        
        return $result->compte;
    }

    /*Inscription de l'user sur le site*/
    static function signUp($db,$mail,$nom,$prenom,$new_mdp,$date,$statut,$key){
        $signUp = 'INSERT INTO profil SET mail = :mail, nom = :nom, prenom = :prenom, mdp = :mdp, dateSignUp = :date, statut = :statut,keyGenerator = :key';
        /*Préparation de la requête sql*/
        $stmt = $db->prepare($signUp);

        /*On lie nos variables à nos paramétres entrés dans la requête*/
        $stmt->bindParam(':mail', $mail, PDO::PARAM_STR, 255);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR, 255);
        $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR, 255);
        $stmt->bindParam(':mdp', $new_mdp, PDO::PARAM_STR, 255);
        $stmt->bindParam(':date',$date,PDO::PARAM_INT,55);
        $stmt->bindParam(':statut',$statut,PDO::PARAM_STR,255);
        $stmt->bindParam(':key',$key,PDO::PARAM_STR,255);
        /*Lancement de la requête SQL*/
        $stmt->execute();
    }
}