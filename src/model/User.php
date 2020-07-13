<?php

namespace App\src\model;

class User
{
    /**
     * @var int
     */
    private $id_user;

    /**
     * @var string
     */
    private $pseudo;

    /**
     * @var string
     */
    private $mail;

    /**
     * @var string
     */
    private $pass;

    /**
     * @var \DateTime
     */
    private $create_date;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id_user;
    }

    /**
     * @param int $id
     */
    public function setId($id_user)
    {
        $this->id = $id_user;
    }

    /**
     * @return string
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param string $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return string
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param string $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    /**
     * @return int 
     */
    public function getDroits()
    {
        return $this->droits;
    }

    /**
     * @param int $droits
     */
    public function setDroits($droits)
    {
        $this->pass = $droits;
    }


    /**
     * @return \DateTime
     */
    public function getCreateDate()
    {
        return $this->create_date;
    }

    /**
     * @param \DateTime $create_date
     */
    public function setCreateDate($create_date)
    {
        $this->create_date = $create_date;
    }
}