<?php

namespace App\src\model;

class Article
{
    
    private $id;
    private $pseudo;
    private $mini_content;
    private $title;
    private $content;
    private $creation_date_fr;
    private $update_date_fr;

    
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

    public function getTitle()
    {
        return $this->title;
    }

    public function getMiniContent()
    {
        return $this->mini_content;
    }

    
    public function setMiniContent($mini_content)
    {
        $this->mini_content = $mini_content ;
    }

    
    public function setTitle($title)
    {
        $this->title = $title;
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

    public function getUpdateDate()
    {
        return $this->update_date_fr;
    }

   
    public function setUpdateDate($update_date)
    {
        $this->update_date_fr = $update_date;
    }
}