<?php

namespace App\src\model;

class User
{
   
    private $id_user;
    private $pseudo;
    private $mail;
    private $pass;
    private $create_date;

    
    public function getId()
    {
        return $this->id_user;
    }

    public function setId($id_user)
    {
        $this->id_user = $id_user;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    public function getDroits()
    {
        return $this->droits;
    }

    public function setDroits($droits)
    {
        $this->pass = $droits;
    }

    public function getCreateDate()
    {
        return $this->create_date;
    }

    public function setCreateDate($create_date)
    {
        $this->create_date = $create_date;
    }
}
