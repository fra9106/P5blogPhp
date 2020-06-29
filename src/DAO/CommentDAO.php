<?php

namespace App\src\DAO;

class CommentDAO extends DAO
{
    public function getCommentsFromArticle($articleId)
    {
        $sql = 'SELECT comments.id, comments.id_article, users.pseudo, comments.content, comments.valid, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments INNER JOIN users ON comments.id_user = users.id WHERE id_article = ? AND valid = 1 ORDER BY comment_date DESC';
        return $this->createQuery($sql, [$articleId]);
    }
}