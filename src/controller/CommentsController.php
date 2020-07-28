<?php

namespace App\src\controller;

use App\config\Parameter;

class CommentsController extends Controller
{
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
        if($post->get('submit')) {
            $errors = $this->validation->validate($post, 'Comment');
            if(!$errors) {
                $sessId = $this->session->get('id');
                $this->commentDAO->addComment($post, $sessId, $articleId);
                $this->session->set('add_comment', 'Commentaire ajouté en attente de validation !');
            }
            $article = $this->articleDAO->getArticle($articleId);
            $comments = $this->commentDAO->getCommentsArticle($articleId);
            return $this->view->render('single', [
                'article' => $article,
                'comments' => $comments,
                'post' => $post,
                'errors' => $errors
            ]);
        }
    }

    /**
     * valid comment (admin)
     *
     * @param [type] $commentId
     * @return void
     */
    public function validComment($commentId)
    {
        $this->commentDAO->validComment($commentId);
        $this->session->set('valid_comment', 'Commentaire validé !');
        $comments = $this->commentDAO->getComments();
        return $this->view->render('commentsListAdmin', [
           'comments' => $comments
        ]);
    }

    /**
     * list admin comments page
     *
     * @return void
     */
    public function commentsListAdmin(){
        $comments = $this->commentDAO->getComments();
        return $this->view->render('commentsListAdmin', [
           'comments' => $comments
        ]);
    }

    /**
     * delete comment (admin)
     *
     * @param [type] $commentId
     * @return void
     */
    public function deleteCommentAdmin($commentId)
    {
        $this->commentDAO->deleteComment($commentId);
        $this->session->set('delete_commentAdmin', 'Commentaire supprimé !');
        $comments = $this->commentDAO->getComments();
        return $this->view->render('commentsListAdmin', [
           'comments' => $comments
        ]);
    }
}
