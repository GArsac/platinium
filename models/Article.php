<?php

/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 12/05/2016
 * Time: 13:13
 */
class Article
{
    private $_id,
            $_texte,
            $_date,
            $_id_theme,
            $_id_profil;

    public function __construct($_id=null, $_texte=null, $_date=null, $_id_theme=null, $_id_profil=null)
    {
        $this->_id = $_id;
        $this->_texte = $_texte;
        $this->_date = $_date;
        $this->_id_theme = $_id_theme;
        $this->_id_profil = $_id_profil;
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
     * @return mixed
     */
    public function getDate()
    {
        return $this->_date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->_date = $date;
    }

    /**
     * @return mixed
     */
    public function getIdTheme()
    {
        return $this->_id_theme;
    }

    /**
     * @param mixed $id_theme
     */
    public function setIdTheme($id_theme)
    {
        $this->_id_theme = $id_theme;
    }

    /**
     * @return mixed
     */
    public function getIdProfil()
    {
        return $this->_id_profil;
    }

    /**
     * @param mixed $id_profil
     */
    public function setIdProfil($id_profil)
    {
        $this->_id_profil = $id_profil;
    }


}