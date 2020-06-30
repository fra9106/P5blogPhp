<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\Article;


class ArticleDAO extends DAO
{

    private function buildObject($row)
    {
        $article = new Article();
        $article->setId($row['id']);
        $article->setPseudo($row['pseudo']);
        $article->setMiniContent($row['mini_content']);
        $article->setTitle($row['title']);
        $article->setContent($row['content']);
        $article->setCreationDate($row['creation_date_fr']);
        $article->setUpdateDate($row['update_date_fr']);
        return $article;
    }

    public function getArticles()
    {
        $sql = 'SELECT categories.id, categories.category, articles.id, users.pseudo, articles.mini_content, articles.title, articles.content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, DATE_FORMAT(update_date, \'%d/%m/%Y à %Hh%imin%ss\') AS update_date_fr FROM articles INNER JOIN users ON articles.id_user = users.id INNER JOIN categories ON articles.id_category = categories.id AND valid = 1 ORDER BY creation_date_fr DESC';
        $result = $this->createQuery($sql);
        $articles = [];
        foreach($result as $row){
            $articleId = $row['id'];
            $articles[$articleId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $articles;
    }

    public function getArticle($articleId)
    {
        $sql = 'SELECT categories.id, categories.category, articles.id, users.pseudo, articles.mini_content, articles.title, articles.content, articles.valid, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, DATE_FORMAT(update_date, \'%d/%m/%Y à %Hh%imin%ss\') AS update_date_fr FROM articles INNER JOIN users ON articles.id_user = users.id INNER JOIN categories ON articles.id_category = categories.id ORDER BY creation_date_fr DESC';
        $result = $this->createQuery($sql, [$articleId]);
        $article = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($article);
    
    }

    public function addArticle(Parameter $post)
    {
        
        $sql = 'INSERT INTO articles(title, mini_content, content, creation_date) VALUES (?, ?, ?, NOW())';
        $this->createQuery($sql, [$post->get('title'), $post->get('mini_content'), $post->get('content')]);
    }
}