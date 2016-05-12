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
session_start();
connect($db);   
$_SESSION['user']->createArticle($_POST['articleName'], $_POST['theme'], $_POST['texte'], $db);