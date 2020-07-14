<?php

namespace App\src\controller;

use App\config\Parameter;

class BackController extends Controller
{
    private function checkLog()
    {
        if(!$this->session->get('pseudo')) {
            $this->session->set('need_login', 'Pour accéder à cette page, merci de vous connecter !');
           return $this->view->render('login');
        } else {
            return true;
        }
    }

    private function checkAdmin()
    {
        $this->checkLog();
        if(!($this->session->get('droits') === '1')) {
            $this->session->set('not_admin', '... mais vous n\'avez aucun droits adminstrateur pour accéder à cette page !');
           header('Location:index.php?route=profile');
        } else {
            return true;
        }
    }

    public function administration()
    {
        if($this->checkAdmin()) {
            $articles = $this->articleDAO->getArticles();
           
            //$users = $this->userDAO->getUsers();

            return $this->view->render('administration', [
                'articles' => $articles
               
                //'users' => $users
            ]);   
        }
    }

    public function addArticle(Parameter $post)
    {
        if($post->get('submit')) {
        $errors = $this->validation->validate($post, 'Article');
           if(!$errors) {
                $this->articleDAO->addArticle($post, $this->session->get('id'));
                $this->session->set('add_article', 'Nouvel article ajouté !');
                return header('Location:index.php?route=articlesListAdmin');
            }
                return $this->view->render('add_article', [
                'post' => $post,
                'errors' => $errors
            ]);
        }
        return $this->view->render('add_article');
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
            $articles = $this->articleDAO->getArticles();
            return $this->view->render('articlesListAdmin', [
                'articles' => $articles
            ]);
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

    public function profile($userId)
    {  
        $userId=$this->session->get('id');
        $user=$this->userssDAO->getUsersInfos($userId);

        return $this->view->render('profile', [
            'user' => $user
        ]);
    }

}