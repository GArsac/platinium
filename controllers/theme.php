<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require '../models/Admin.php';
session_start();
connect($db);
/*On vérifie si le champs theme de la page*/

if (!isset($_SESSION['user']) == true){

    if ($_SESSION['user']->getStatut() == "admin"){
        header("Location:../views/pages/home.php");
    }
    
    header("Location:../index.php");
}

if(!isset($value)==true){
    $value = 4;
}else{
    $value = $_POST['value'];   
}
/*Ajout de thème*/
if($value == 3) {
    $theme = $_POST['theme'];
    $_SESSION['user']->addTheme($theme, $db);
}
/*Suppression thème*/
if($value == 4) {
    $id = $_POST['ref'];
    $_SESSION['user']->deleteTheme($id, $db);
    if($_SESSION['user']->deleteTheme($id, $db)== true){
        echo 'Suppression réussie';
    }
    elseif ($_SESSION['user']->deleteTheme($id, $db)== false){
        echo 'Echec de la suppression';
    }
}
