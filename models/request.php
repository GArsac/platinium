<?php
/*Ensemble des requêtes utilisés dans les fichiers du dossier controllers*/

/*Requête pour l'inscription*/
$signUp = 'INSERT INTO profil SET mail = :mail, nom = :nom, prenom = :prenom, mdp = :mdp, dateSignUp = :date, statut = :statut';
$checkSignUp =  'SELECT COUNT(id_profil) compte FROM profil WHERE mail = :mail';

/*Requête pour la connexion*/
$signIn = 'SELECT COUNT(id_profil) compte,enabled FROM profil WHERE mail = :mail AND mdp = :mdp GROUP BY enabled';