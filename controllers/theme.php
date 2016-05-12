<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
/*Ajout thème*/
$theme = $_POST['theme'];
require '../models/Admin.php';


/*On vérifie si le champs theme de la page*/
session_start();
$value = $_POST['value'];
if($value == 3) {
    $_SESSION['user']->addTheme($theme, $db);
}
/*Suppression thème*/
if($value == 4) {
    $id = $_POST['valeur'];
    echo $id;
    $_SESSION['user']->deleteTheme($id, $db);
    if($_SESSION['user']->deleteTheme($id, $db)== true){
        echo 'Suppression réussie';
    }
    elseif ($_SESSION['user']->deleteTheme($id, $db)== false){
        echo 'Echec de la suppression';
    }
}

