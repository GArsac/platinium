<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/05/16
 * Time: 10:37
 */

error_reporting(E_ALL);
ini_set("display_errors", 1);
require '../../models/Auteur.php';
require '../../models/Article.php';
session_start();
connect($db);


$_SESSION['user']->createArticle($_POST['articleName'], $_POST['theme'], $_POST['texte'], $db);

$nom = $_POST['articleName'];
$selectArticle = 'SELECT nom,id_article,txt,date,id_theme,id_profil  FROM article WHERE nom = :nom';
$stmt = $db->prepare($selectArticle);
$stmt->bindParam(':nom', $nom, PDO::PARAM_STR, 255);
$stmt->execute();
$result = $stmt->fetch();

new Article($result->id_article,$result->txt,$result->date,$result->id_theme,$result->id_profil);

header('Location:home.php');Zsud 