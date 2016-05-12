<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/05/16
 * Time: 14:05
 */
require '../models/Admin.php';
class Admins
{
    public function displayTheme($db){
        $allTheme = 'SELECT * FROM thematique';
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
        <form method="post" action="">
        <button type="submit" class="center btn btn-primary btn-md" name="value" value="' . $ref . '" id="button">Supprimer ce thème</button>
        </form>
        </div>
        </div>';
        }
    }
}