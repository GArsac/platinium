<?php
/*Ensemble des requêtes utilisés dans les fichiers du dossier controllers*/

/*Requête pour l'inscription*/
$signUp = 'INSERT INTO profil SET mail = :mail, nom = :nom, prenom = :prenom, mdp = :mdp, dateSignUp = :date, statut = :statut';
/*Requête pour la vérification de l'inscription*/
$checkSignUp =  'SELECT COUNT(id_profil) compte FROM profil WHERE mail = :mail';

/*Requête pour la connexion*/
$signIn = 'SELECT COUNT(id_profil) compte,enabled FROM profil WHERE mail = :mail AND mdp = :mdp GROUP BY enabled';

/*Requête pour l'ajout de theme*/
$addTheme = 'INSERT INTO thematique SET nom = :nom';
/*Requête pour la vérification du theme existante*/
$checkTheme = 'SELECT COUNT(id_theme) compte FROM thematique WHERE nom = :nom';