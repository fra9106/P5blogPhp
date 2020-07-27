<?php

namespace App\src\model;

class Article
{
    
    private $id_article;
    private $id_category;
    private $pseudo;
    private $mini_content;
    private $title;
    private $content;
    private $creation_date_fr;
    private $update_date_fr;

    
    public function getId()
    {
        return $this->id_article;
    }

    public function setId($id_article)
    {
        $this->id_article = $id_article;
    }

    public function getCategory()
    {
        return $this->id_category;
    }

    public function setCategory($id_category)
    {
        $this->id_category = $id_category;
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
        $this->mini_content = $mini_content;
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
