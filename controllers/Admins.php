<?php

class Admins
{
    public static function displayTheme($db){
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

    public static function deleteTheme($id,$db){
        $deleteTheme= 'DELETE FROM thematique WHERE id_theme = :id';
        $stmt = $db->prepare($deleteTheme);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT, 55);
        $stmt->execute();
    }

    public static function displayUser($db){
        $allUser = 'SELECT * FROM profil';
        $stmt = $db->prepare($allUser);
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
        <button type="submit" class="center btn btn-primary btn-md" name="value" value="' . $ref . '" id="button">Supprimer cet utilisateur</button>
        <button type="submit" class="center btn btn-primary btn-md" name="value" value="' . $ref . '" id="button">Changer cet utilisateur en admin</button>
        </form>
        </div>
        </div>';
        }
    }

    public static function upgradeUser($db,$id){
        $new_statut = 'admin';
        $upgradeUser = 'UPDATE profil SET statut = :new_statut WHERE id_profil = :id';
        $stmt = $db->prepare($upgradeUser);
        $stmt->bindParam(':new_statut', $new_statut, PDO::PARAM_STR, 255);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT, 55);
        $stmt->execute();

    }

    public static function deleteUser($id,$db){
        $deleteUser = 'DELETE FROM profil WHERE id_profil = :id';
        $stmt = $db->prepare($deleteUser);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT, 55);
        $stmt->execute();
    }

}