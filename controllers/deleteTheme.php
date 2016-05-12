<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require '../models/connect.php';
require '../models/request.php';
/*Connexion à la bdd*/
connect($db);
$id = $_POST['valeur'];


$stmt = $db->prepare($deleteTheme);
$stmt->bindParam(':id', $id, PDO::PARAM_STR, 255);
$result = $stmt->execute();

if( $result == true){
    echo 'Succès de la suppression';
}elseif ($result == false){
    echo 'Echec de la suppression: theme inexistant';
}