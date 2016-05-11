<?php

if(!class_exists('Human')) { include 'Human.php'; }

class Admin extends Human
{
    public function checkTheme($theme, $db)
    {
        $checkTheme = 'SELECT COUNT(id_theme) compte FROM thematique WHERE nom = :nom';
        $stmt = $db->prepare($checkTheme);
        $stmt->bindParam(':nom', $theme, PDO::PARAM_STR, 255);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result->compte;

    }

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
        if ($result == true) {
            echo 'Succès de la suppression';
        } elseif ($result == false) {
            echo 'Echec de la suppression: theme inexistant';
        }
        return $result;
    }
}