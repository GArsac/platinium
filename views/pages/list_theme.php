<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require '../../models/request.php';
require '../../models/connect.php';

connect($db);

$stmt = $db->prepare($allTheme);
$stmt->execute();
$result = $stmt->fetchAll();

for ($index = 0; $index < sizeof($result); $index++) {
    /*Affection des résultats*/
    $category = $result[$index]->nom;
    $ref = $result[$index]->id_theme;
    echo '<div class="col-xs-3">
        <p class="center">
        '.$category.' 
        <div style="margin: 0;float:right;">
        <form method="post" action="../../controllers/theme.php">
        <a name="valeur" value="' . $ref . '"></a>
        <button type="submit" class="center btn btn-primary btn-md" name="value" value="4" id="button">Supprimer ce thème</button>
        </form>
        </div>
        </div>';
}