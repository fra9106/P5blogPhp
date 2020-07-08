<?php

namespace App\src\controller;

use App\config\Parameter;

class BackController extends Controller
{
    public function addArticle(Parameter $post)
    {
        if($post->get('submit')) {
            $this->articleDAO->addArticle($post);
            $this->session->set('add_article', 'Nouvel article ajouté');
            header('Location:../index.php?route=articlesListAdmin');
        }
        return $this->view->render('add_article', [
            'post' => $post
        ]);
    }
    public function articlesListAdmin(){
        $articles = $this->articleDAO->getArticles();
        return $this->view->render('articlesListAdmin', [
           'articles' => $articles
        ]);
    }

    public function editArticleAdmin(Parameter $post, $articleId)
    {
        $article = $this->articleDAO->getArticle($articleId);
        if($post->get('submit')){
            $this->articleDAO->articleEditAdmin($post, $articleId);
            $this->session->set('articlesListAdmin', 'Article modifié !');
            header('Location:index.php?route=articlesListAdmin');
        }    
        return $this->view->render('edit_ArticleAdmin', [
            'article' => $article
        ]);
    }

    public function confirmDeleteArticle($articleId)
    {
        $article = $this->articleDAO->getArticle($articleId);
        return $this->view->render('confirmDeleteArticle', [
            'article' => $article
        ]);
    }

    public function deleteArticleAdmin($articleId)
    {
        $this->articleDAO->deleteArticle($articleId);
        $this->session->set('delete_articleAdmin', 'Article supprimé');
        $articles = $this->articleDAO->getArticles();
        return $this->view->render('articlesListAdmin', [
           'articles' => $articles
        ]);
    }

    public function validComment($commentId)
    {
        $this->commentDAO->validComment($commentId);
        $this->session->set('valid_comment', 'Commentaire validé !');
        $comments = $this->commentDAO->getComments();
        return $this->view->render('commentsListAdmin', [
           'comments' => $comments
        ]);
    }

    public function commentsListAdmin(){
        $comments = $this->commentDAO->getComments();
        return $this->view->render('commentsListAdmin', [
           'comments' => $comments
        ]);
    }

    public function confirmDeleteComment($commentId)
    {
        $comment = $this->commentDAO->getComment($commentId);
        return $this->view->render('confirmDeleteComment', [
            'comment' => $comment
        ]);
        
    }

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