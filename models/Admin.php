<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 06/05/16
 * Time: 09:34
 */

class Admin
{
    private $_nom,
            $_prenom,
            $_mail,
            $_statut;

    /**
     * Admin constructor.
     * @param $_nom
     * @param $_prenom
     * @param $_statut
     * @param $_mail
     */
    public function __construct($_nom, $_prenom, $_statut, $_mail)
    {
        $this->_nom = $_nom;
        $this->_prenom = $_prenom;
        $this->_statut = $_statut;
        $this->_mail = $_mail;
    }


    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->_nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->_nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->_prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->_prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->_mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->_mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getStatut()
    {
        return $this->_statut;
    }

    /**
     * @param mixed $statut
     */
    public function setStatut($statut)
    {
        $this->_statut = $statut;
    }

    public function addTheme($theme,$db)
    {
        $checkTheme = 'SELECT COUNT(id_theme) compte FROM thematique WHERE nom = :nom';
        $addTheme = 'INSERT INTO thematique SET nom = :nom';

        if (!empty($theme)) {

            $stmt = $db->prepare($checkTheme);
            $stmt->bindParam(':nom', $theme, PDO::PARAM_STR, 255);
            $stmt->execute();
            $result = $stmt->fetch();


            if ($result->compte == 1) {
                echo $theme . ' existe déjà.';
                echo '<br>';
                header('../views/pages/signUp.php');
            } elseif ($result->compte == 0) {
                /*On prépare la requête*/
                $stmt = $db->prepare($addTheme);
                $stmt->bindParam(':nom', $theme, PDO::PARAM_STR, 255);
                $stmt->execute();
                echo 'Thème ajouté';
                echo '<br>';
            }
        }
    }
}