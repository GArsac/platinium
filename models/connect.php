<?php
/*On crée un objet PDO contenant la description de la bdd */
$db = new PDO('mysql:host=localhost;port=3306;dbname=platinium;charset=utf8', 'root', 'azerty');
function connect($db)
{
    try {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return true;
    } catch (PDOException $pe) {
        echo $pe->getMessage();
    }
}