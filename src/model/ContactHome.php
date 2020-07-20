<?php

namespace App\src\model;

class ContactHome
{
    private $id_message;
    private $username;
    private $mail;
    private $content;
    private $creation_date_fr;

    public function getId()
    {
        return $this->id_message;
    }

    public function setId($id_message)
    {
        $this->id_message = $id_message;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getCreationDate()
    {
        return $this->creation_date_fr;
    }

   public function setCreationDate($creation_date)
    {
        $this->creation_date_fr = $creation_date;
    }
}
