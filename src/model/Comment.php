<?php

namespace App\src\model;

class Comment
{
    private $id_comment;
    private $pseudo;
    private $content;
    private $valid;
    private $creation_date_fr;

    
    public function getId()
    {
        return $this->id_comment;
    }

    
    public function setId($id_comment)
    {
        $this->id_comment = $id_comment;
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

    public function getValid()
    {
        return $this->valid;
    }

   
    public function setValid($valid)
    {
        $this->valid = $valid;
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
