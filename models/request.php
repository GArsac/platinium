<?php
/*Ensemble des requêtes utilisés dans les fichiers du dossier controllers*/

$signUp = 'INSERT INTO profil SET mail = :mail, nom = :nom, prenom = :prenom, mdp = :mdp';

$verif_signUp =  'SELECT COUNT(id_profil) compte FROM profil WHERE mail = :mail';

$signIn = 'SELECT COUNT(id_profil) compte FROM profil WHERE mail = :mail AND mdp = :mdp';