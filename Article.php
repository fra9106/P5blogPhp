<?php

class Article extends Database
{
    public function getArticles()
    {
        $sql = 'SELECT categories.id, categories.category, articles.id, users.pseudo, articles.mini_content, articles.title, articles.content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, DATE_FORMAT(update_date, \'%d/%m/%Y à %Hh%imin%ss\') AS update_date_fr FROM articles INNER JOIN users ON articles.id_user = users.id INNER JOIN categories ON articles.id_category = categories.id AND valid = 1 ORDER BY creation_date_fr DESC';
        return $this->createQuery($sql);
    }

    public function getArticle($articleId)
    {
        $sql = 'SELECT categories.id, categories.category, articles.id, users.pseudo, articles.mini_content, articles.title, articles.content, articles.valid, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, DATE_FORMAT(update_date, \'%d/%m/%Y à %Hh%imin%ss\') AS update_date_fr FROM articles INNER JOIN users ON articles.id_user = users.id INNER JOIN categories ON articles.id_category = categories.id ORDER BY creation_date_fr DESC';
        return $this->createQuery($sql, [$articleId]);
    }
}