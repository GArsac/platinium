<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/05/16
 * Time: 09:11
 */
require 'Database.php';

abstract class Human
{
    private $_nom,
        $_prenom,
        $_mail,
        $_mdp,
        $_id,
        $_statut;


    /**
     * Admin constructor.
     * @param $_nom
     * @param $_prenom
     * @param $_mail
     * @param $_statut
     * @param $_mdp
     */
    public function __construct($_nom = null, $_prenom = null, $_mail = null, $_mdp = null, $_statut = null, $_id = null)
    {
        $this->_nom = $_nom;
        $this->_prenom = $_prenom;
        $this->_mail = $_mail;
        $this->_mdp = $_mdp;
        $this->_statut = $_statut;
        $this->_id = $_id;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * @return null
     */
    public function getMdp()
    {
        return $this->_mdp;
    }

    /**
     * @param null $mdp
     */
    public function setMdp($mdp)
    {
        $this->_mdp = $mdp;
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
     * @return null
     */
    public function getStatut()
    {
        return $this->_statut;
    }

    /**
     * @param null $statut
     */
    public function setStatut($statut)
    {
        $this->_statut = $statut;
    }

    /**
     * @return mixed
     */

    public function Update($nom, $prenom, $mail, $db)
    {
        $update = 'UPDATE profil SET nom = :nom AND prenom = :prenom WHERE mail = :mail; ';
        $stmt = $db->prepare($update);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR, 255);
        $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR, 255);
        $stmt->bindParam(':mail', $mail, PDO::PARAM_STR, 255);
        $stmt->execute();
    }

    public function UpdatePassword($password, $mail, $db)
    {
        $update_password = 'UPDATE profil SET mdp = :pwd WHERE mail = :mail; ';
        $stmt = $db->prepare($update_password);
        $stmt->bindParam(':pwd', $password, PDO::PARAM_STR, 255);
        $stmt->bindParam(':mail', $mail, PDO::PARAM_STR, 255);
        $stmt->execute();
    }

    static function findStatut($mail, $pwd, $db)
    {
        $statut = 'SELECT statut FROM profil WHERE mail = :mail AND mdp = :pwd';
        $stmt = $db->prepare($statut);
        $stmt->bindParam(':pwd', $pwd, PDO::PARAM_STR, 255);
        $stmt->bindParam(':mail', $mail, PDO::PARAM_STR, 255);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result->statut;
    }

    public static function findByCrendential($mail, $password, $db)
    {
        /*Vérifie l'existence de l'utilisateur*/
        if ($check = Database::checkExistence($mail, $password, $db) == 1) {
            /*Détermine le statut de l'utilisateur*/
            $statut = self::findStatut($mail, $password, $db);
            if ($statut == "admin") {
                $result = Database::connexion($mail, $password, $db);
                $user = new Admin($result->nom, $result->prenom, $mail, $password, $statut, $result->id_profil);
                return $user;
            } elseif ($statut == "auteur") {
                $result = Database::connexion($mail, $password, $db);
                $user = new Auteur($result->nom, $result->prenom, $mail, $password, $statut, $result->id_profil);
                return $user;
            } elseif ($statut == "user") {
                $result = Database::connexion($mail, $password, $db);
                $user = new User($result->nom, $result->prenom, $mail, $password, $statut, $result->id_profil);
                return $user;
            }
        }

    }
}