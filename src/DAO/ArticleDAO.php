<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\Article;


class ArticleDAO extends DAO
{

    /**
     * builder article objet
     *
     * @param [type] $row
     * @return void
     */
    private function buildObject($row)
    {
        $article = new Article();
        $article->setId($row['id']);
        $article->setCategory($row['category']);
        $article->setPseudo($row['pseudo']);
        $article->setMiniContent($row['mini_content']);
        $article->setTitle($row['title']);
        $article->setContent($row['content']);
        $article->setCreationDate($row['creation_date_fr']);
        $article->setUpdateDate($row['update_date_fr']);
        return $article;
    }

    /**
     * recovery articles list
     *
     * @return void
     */
    public function getArticles()
    {
        $sql = 'SELECT categories.id, categories.category, articles.id, users.pseudo, articles.mini_content, articles.title, articles.content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, DATE_FORMAT(update_date, \'%d/%m/%Y à %Hh%imin%ss\') AS update_date_fr FROM articles INNER JOIN users ON articles.id_user = users.id INNER JOIN categories ON articles.id_category = categories.id ORDER BY creation_date DESC';
        $result = $this->createQuery($sql);
        $articles = [];
        foreach($result as $row){
            $articleId = $row['id'];
            $articles[$articleId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $articles;
    }

    /**
     * recovery articles list by categories
     *
     * @param [type] $catId
     * @return void
     */
    public function articlesByCat($catId)
    {
        $sql = 'SELECT categories.id, categories.category, articles.id, users.pseudo, articles.mini_content, articles.title, articles.content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, DATE_FORMAT(update_date, \'%d/%m/%Y à %Hh%imin%ss\') AS update_date_fr FROM articles INNER JOIN users ON articles.id_user = users.id INNER JOIN categories ON articles.id_category = categories.id  WHERE id_category = ? ORDER BY creation_date DESC';
        $result = $this->createQuery($sql, [$catId]);
        $articles = [];
        foreach($result as $row){
            $articleId = $row['id'];
            $articles[$articleId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $articles;
    }

    /**
     * recovery article by Id
     *
     * @param [type] $articleId
     * @return void
     */
    public function getArticle($articleId)
    {
        $sql = 'SELECT categories.id, categories.category, articles.id, users.pseudo, articles.mini_content, articles.title, articles.content, articles.valid, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, DATE_FORMAT(update_date, \'%d/%m/%Y à %Hh%imin%ss\') AS update_date_fr FROM articles INNER JOIN users ON articles.id_user = users.id INNER JOIN categories ON articles.id_category = categories.id WHERE articles.id = ?';
        $result = $this->createQuery($sql, [$articleId]);
        $article = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($article);
    
    }

    /**
     * add article
     *
     * @param Parameter $post
     * @param [type] $idUser
     * @return void
     */
    public function addArticle(Parameter $post, $idUser)
    {
        $sql = 'INSERT INTO articles(id_category, id_user, title, mini_content, content, creation_date) VALUES (?, ?, ?, ?, ?, NOW())';
        $this->createQuery($sql, [$post->get('id_category'), $idUser, $post->get('title'), $post->get('mini_content'), $post->get('content')]);
    }

    /**
     * edit article by Id
     *
     * @param Parameter $post
     * @param [type] $articleId
     * @return void
     */
    public function ArticleEditAdmin(Parameter $post, $articleId)
    {
        {
            $sql = 'UPDATE articles SET mini_content=:mini_content, title=:title, content=:content, update_date = NOW() WHERE id=:articleId';
            $this->createQuery($sql, [
                'mini_content' => $post->get('mini_content'),
                'title' => $post->get('title'),
                'content' => $post->get('content'),
                'articleId' => $articleId
            ]);
        }
    }

    /**
     * delete article by Id
     *
     * @param [type] $articleId
     * @return void
     */
    public function deleteArticle($articleId)
    {
        $sql = 'DELETE FROM articles WHERE id = ?';
        $this->createQuery($sql, [$articleId]);
    }
}
