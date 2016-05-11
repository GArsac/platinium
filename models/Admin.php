<?php

if(!class_exists('Human')) { include 'Human.php'; }

class Admin extends Human
{
    /*Vérifie l'existence du thème via une requête SQL*/
    public function checkTheme($theme, $db)
    {
        $checkTheme = 'SELECT COUNT(id_theme) compte FROM thematique WHERE nom = :nom';
        $stmt = $db->prepare($checkTheme);
        $stmt->bindParam(':nom', $theme, PDO::PARAM_STR, 255);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result->compte;

    }
    /*Ajout d'un thème à la base de données via une requête SQL*/
    public function addTheme($theme, $db)
    {
        $addTheme = 'INSERT INTO thematique SET nom = :nom';

        if (!empty($theme)) {
            $result = $this->checkTheme($theme, $db);

            if ($result == 1) {
                echo $theme . ' existe déjà.';
                echo '<br>';
                header('../views/pages/signUp.php');
                return false;
            } elseif ($result == 0) {
                /*On prépare la requête*/
                $stmt = $db->prepare($addTheme);
                $stmt->bindParam(':nom', $theme, PDO::PARAM_STR, 255);
                $stmt->execute();
                echo 'Thème ajouté';
                echo '<br>';
                return true;
            }
        }
    }

    public function deleteTheme($id, $db)
    {
        $deleteTheme = 'DELETE FROM thematique WhERE id_theme = :id';
        $stmt = $db->prepare($deleteTheme);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR, 255);
        $result = $stmt->execute();
        return $result;
    }
}