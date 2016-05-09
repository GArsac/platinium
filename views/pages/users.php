<?php
session_start();

require '../../models/User.php';


$user = new User('lapa','julien', 'julien.lapa@ynov.com','User');


$mail = $user->getMail();
$nom = $user->getNom();
$prenom = $user->getPrenom();
$statut= $user->getStatut();


?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil Utilisateur</title>
</head>
<body>
<div>
    <label >Profil :</label>
    <?php echo '<div >'.$prenom.'</div>
    <div >'.$nom.'</div>
    <div >'.$mail.'</div>
    <div >'.$statut.'</div>';?>
</div>

</body>
</html>
