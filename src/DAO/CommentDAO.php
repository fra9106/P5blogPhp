<?php

namespace App\src\DAO;

use App\src\model\Comment;
use App\config\Parameter;

class CommentDAO extends DAO
{
    /**
     * builder Objet comment
     *
     * @param [type] $row
     * @return void
     */
    private function buildObject($row)
    {
        $comment = new Comment();
        $comment->setId($row['id']);
        $comment->setPseudo($row['pseudo']);
        $comment->setContent($row['content']);
        $comment->setValid($row['valid']);
        $comment->setCreationDate($row['comment_date_fr']);
        return $comment;
    }

    /**
     * recovery comments by article Id
     *
     * @param [type] $articleId
     * @return void
     */
    public function getCommentsArticle($articleId)
    {
        $sql = 'SELECT comments.id, comments.id_article, users.pseudo, comments.content, comments.valid, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments INNER JOIN users ON comments.id_user = users.id WHERE id_article = ? AND valid = 1 ORDER BY comment_date DESC';
        $result = $this->createQuery($sql, [$articleId]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }

    /**
     * add comment
     *
     * @param Parameter $post
     * @param [type] $sessId
     * @param [type] $articleId
     * @return void
     */
    public function addComment(Parameter $post, $sessId, $articleId)
    {
        $sql = 'INSERT INTO comments(id_article, id_user, content, comment_date) VALUES( ?, ?, ?, NOW())';
        $this->createQuery($sql, [$articleId, $sessId, $post->get('content')]);
    }

    /**
     * comment validation
     *
     * @param [type] $commentId
     * @return void
     */
    public function validComment($commentId)
    {
        $sql = 'UPDATE comments SET valid = ? WHERE id = ?';
        $this->createQuery($sql, [1, $commentId]);
    }

    /**
     * recovery list comments admin
     *
     * @return void
     */
    public function getComments()
    {
        $sql = 'SELECT comments.id, users.pseudo, comments.content, comments.valid, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments INNER JOIN users ON comments.id_user = users.id  ORDER BY comment_date DESC';
        $result = $this->createQuery($sql);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments; 
    }

    /**
     * recovery comment by Id
     *
     * @param [type] $commentId
     * @return void
     */
    public function getComment($commentId)
    {
        $sql ='SELECT comments.id, users.pseudo, comments.content, comments.valid, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments INNER JOIN users ON comments.id_user = users.id WHERE comments.id = ?';
        $result = $this->createQuery($sql, [$commentId]);
        $comment = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($comment);
    }

    /**
     * delete comment admin
     *
     * @param [type] $commentId
     * @return void
     */
    public function deleteComment($commentId)
    {
        $sql = 'DELETE FROM comments WHERE id = ?';
        $this->createQuery($sql, [$commentId]);
    }
}
