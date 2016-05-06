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
     * @param $_mail
     * @param $_statut
     */
    public function __construct($_nom, $_prenom, $_mail, $_statut)
    {
        $this->_nom = $_nom;
        $this->_prenom = $_prenom;
        $this->_mail = $_mail;
        $this->_statut = $_statut;
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


}