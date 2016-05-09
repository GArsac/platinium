<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$theme = $_POST['theme'];
require '../models/connect.php';
require '../models/Admin.php';
connect($db);
/*On vérifie si le champs theme de la page*/
session_start();

$_SESSION['user']->addTheme($theme,$db);