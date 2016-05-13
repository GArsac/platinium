<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require '../../models/Admin.php';
require '../../controllers/Admins.php';
session_start();
connect($db);

if($_SESSION['user']->getStatut() == "admin"){
    Admins::displayTheme($db);
    if(isset($_POST['value'])){
        Admins::deleteTheme($_POST['value'],$db);
    }
}
