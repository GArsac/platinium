<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 06/05/2016
 * Time: 10:07
 */

/*Ensemble des requêtes utilisés dans les fichiers du dossier controllers*/
/*Requête pour l'inscription*/
$signUp = 'INSERT INTO profil SET mail = :mail, nom = :nom, prenom = :prenom, mdp = :mdp, dateSignUp = :date, statut = :statut';
/*Requête pour la vérification de l'inscription*/
$checkSignUp =  'SELECT COUNT(id_profil) compte FROM profil WHERE mail = :mail';
/*Requête pour la connexion*/
$signIn = 'SELECT COUNT(id_profil) compte,enabled FROM profil WHERE mail = :mail AND mdp = :mdp GROUP BY enabled';
/*Requête pour l'ajout de theme*/
$addTheme = 'INSERT INTO thematique SET nom = :nom';
/*Requête pour la suppression de theme*/
$deleteTheme = 'DELETE FROM thematique WhERE id_theme = :id';
/*Requête pour la vérification du theme existante*/
$checkTheme = 'SELECT COUNT(id_theme) compte FROM thematique WHERE nom = :nom';
/*Requête pour avoir l'ensemble des thématiques existant sur le site*/
$allTheme = 'SELECT * FROM thematique';

$addArticle = 'INSERT INTO article SET id_article = :id_article, txt = :txt, date = :date';
$modifArticle = 'UPDATE article SET txt = :txt, date = :date WHERE id_article = :id_article';