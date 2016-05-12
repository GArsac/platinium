<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require '../../models/Human.php';
require '../../models/Auteur.php';
require '../../models/User.php';
require '../../models/Admin.php';

session_start();

$mail = $_SESSION['user']->getMail();
$nom = $_SESSION['user']->getNom();
$prenom = $_SESSION['user']->getPrenom();
$statut = $_SESSION['user']->getStatut();


?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil Utilisateur</title>
</head>
<body>
<div>
    <label>Profil :</label>
    <?php
    echo '<div> Prenom:' . htmlentities($prenom) . '</div>
    <div>Nom:' . htmlentities($nom) . '</div>
    <div>Email:' . htmlentities($mail) . '</div>
    <div>Statut:' . htmlentities($statut) . '</div>';
    ?>
</div>

</body>
</html>
