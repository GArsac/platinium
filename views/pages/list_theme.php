<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require '../../models/Database.php';
connect($db);

$result = Database::displayTheme($db);

for ($index = 0; $index < sizeof($result); $index++) {
    /*Affection des résultats*/
    $category = $result[$index]->nom;
    $ref = $result[$index]->id_theme;
    echo '<div class="col-xs-3">
        <p class="center">
        '.$category.' 
        <div style="margin: 0;float:right;">
        <form method="post" action="../../controllers/theme.php">
        <button type="submit" class="center btn btn-primary btn-md" name="ref" value="'.$ref.'" id="button">Supprimer ce thème</button>
        </form>
        </div>
        </div>';
}