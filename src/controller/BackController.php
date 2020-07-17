<?php

namespace App\src\controller;

use App\config\Parameter;

class BackController extends Controller
{
    public function administration()
    {
    return $this->view->render('administration');
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
        $this->session->set('delete_articleAdmin', 'Article supprimé !');
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

    public function updatePseudo(Parameter $post)
    {
        if($post->get('submit')) {
            $errors = $this->validation->validate($post,'User');
            if(!$errors){
            $this->userssDAO->updatePseudo($post, $this->session->get('id'));
            $this->session->set('update_pseudo', 'Le changement de votre pseudo à bien été pris en compte et apparaîtra à votre prochaine connexion !');
        }
            return $this->view->render('editProfile', [
                'post' => $post,
                'errors' => $errors
            ]);
        }
        return $this->view->render('editProfile');
    
    }

    public function updateMail(Parameter $post)
    {
        if($post->get('submit')) {
            $errors = $this->validation->validate($post,'User');
            if($this->userssDAO->checkNewMail($post)) {
                $errors['newmail'] = $this->userssDAO->checkNewMail($post);
            }
            if(!$errors) {
            $this->userssDAO->updateMail($post, $this->session->get('id'));
            $this->session->set('update_mail', 'Le changement de votre mail à bien été pris en compte et apparaîtra à votre prochaine connexion !');
            }
           return $this->view->render('editProfile', [
                'post' => $post,
                'errors' => $errors
           ]);
        }
        return $this->view->render('editProfile');
    }

    public function updatePass(Parameter $post)
    {
        if($post->get('submit')) {
            $errors = $this->validation->validate($post,'User');
            if(!$errors){
            $this->userssDAO->updatePass($post, $this->session->get('id'));
            $this->session->set('update_password', 'Le changement de votre mot de passe à bien été pris en compte !');
            }
            return $this->view->render('editProfile', [
                'post' => $post,
                'errors' => $errors
            ]);
        }
        return $this->view->render('editProfile');
    }

    public function editProfile()
    {  
        $this->session->get('id');
        return $this->view->render('editProfile');
    }

    public function deleteUserAccount()
    {
        $this->userssDAO->deleteUserAccount($this->session->get('pseudo'));
        $this->session->stop();
        return $this->view->render('home');
    }

    public function confirmDeleteAccount()
    {
        return $this->view->render('deleteAccountConfirm');
    }
}
