<?php

namespace App\src\model;

class Comment
{
    private $id;
    private $pseudo;
    private $content;
    private $creation_date_fr;

    
    public function getId()
    {
        return $this->id;
    }

    
    public function setId($id)
    {
        $this->id = $id;
    }

    
    public function getPseudo()
    {
        return $this->pseudo;
    }

   
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    
    public function getContent()
    {
        return $this->content;
    }

    
    public function setContent($content)
    {
        $this->content = $content;
    }

    
    public function  getCreationDate()
    {
        return $this->creation_date_fr;
    }

    
    public function  setCreationDate($creation_date)
    {
        $this->creation_date_fr = $creation_date;
    }
}