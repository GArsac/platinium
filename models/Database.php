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
    
    static function checkExistence($mail,$new_mdp,$db){
        $signIn = 'SELECT COUNT(id_profil) compte FROM profil WHERE mail = :mail AND mdp = :mdp';
        $stmt = $db->prepare($signIn);
        $stmt->bindParam(':mail', $mail, PDO::PARAM_STR, 255);
        $stmt->bindParam(':mdp', $new_mdp, PDO::PARAM_STR, 255);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result->compte;
    }
    
    static function connexion($mail,$new_mdp,$db){
        $signIn2 = 'SELECT * FROM profil WHERE mail = :mail AND mdp = :mdp';
        $stmt = $db->prepare($signIn2);
        $stmt->bindParam(':mail', $mail, PDO::PARAM_STR, 255);
        $stmt->bindParam(':mdp', $new_mdp, PDO::PARAM_STR, 255);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
    
    static function checkSignUp($mail,$db){
        $checkSignUp =  'SELECT COUNT(id_profil) compte FROM profil WHERE mail = :mail';
        $stmt = $db->prepare($checkSignUp);
        $stmt->bindParam(':mail', $mail, PDO::PARAM_STR, 255);
        $stmt->execute();
        $result = $stmt->fetch();
        
        return $result->compte;
    }
    
    static function signUp($db,$mail,$nom,$prenom,$new_mdp,$date,$statut){
        $signUp = 'INSERT INTO profil SET mail = :mail, nom = :nom, prenom = :prenom, mdp = :mdp, dateSignUp = :date, statut = :statut';
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
    }
    static function  displayTheme($db){
        $allTheme = 'SELECT * FROM thematique';
        $stmt = $db->prepare($allTheme);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
}