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

    public function usersListAdmin()
    {
        $users = $this->userssDAO->usersListAdmin();
        return $this->view->render('usersListAdmin', [
            'users' => $users
        ]);
    }

    public function confirmDeleteUserAdmin($userId)
    {
        $user = $this->userssDAO->confirmDeleteUserAdmin($userId);
        return $this->view->render('confirmDeleteUserAdmin', [
            'user' => $user
        ]);
    }

    public function deleteUserAccountAdmin($userId)
    {
        $this->userssDAO->deleteUserAccountAdmin($userId);
        $this->session->set('delete_user', 'Compte supprimé !');
        $users = $this->userssDAO->usersListAdmin();
        return $this->view->render('usersListAdmin', [
            'users' => $users
        ]);
    }

    public function addMessage(Parameter $post)
    {
        if($post->get('submit') && $this->session->get('id')) {
           $this->messageHomeDAO->addMessage($post);
           $this->session->set('add_message', 'Message envoyé !');
           return $this->view->render('home');
        }
        $this->session->set('add_message', 'Pour envoyer un message, merci de vous connecter !');
        return $this->view->render('home');
    }

    public function messagesListAdmin()
    {
        $messages = $this->messageHomeDAO->messagesListAdmin();
        return $this->view->render('messagesListAdmin', [
           'messages' => $messages
        ]);
    }

    public function messageAdmin($messageId)
    {
        $message = $this->messageHomeDAO->messageAdmin($messageId);
        return $this->view->render('messageAdmin', [
            'message' => $message
        ]);
    }

    public function confirmDeleteMessageAdmin($messageId)
    {
        $message = $this->messageHomeDAO->messageAdmin($messageId);
        return $this->view->render('confirmDeleteMessageAdmin', [
            'message' => $message
        ]);
    }

    public function deleteMessageAdmin($messageId)
    {
        $this->messageHomeDAO->deleteMessageAdmin($messageId);
        $this->session->set('delete_messageAdmin', 'Message supprimé !');
        $messages = $this->messageHomeDAO->messagesListAdmin();
        return $this->view->render('messagesListAdmin', [
           'messages' => $messages
        ]);
    }

    /**
     * upload picture file
     *
     * @param Parameter $post
     * @param [type] $sessId
     * @return void
     */
    public function getAvatar(Parameter $post, $sessId)
    {
        if($post->get('submit')) {
            if ($this->files->get('avatar') and !empty($this->files->getGet('avatar', 'name'))){
                $tailleMax = 2097152;
                $extensionsValides = array(
                    'jpg',
                    'jpeg',
                    'gif',
                    'png'
                );
                if ($this->files->getGet('avatar', 'size') <= $tailleMax){
                    $extensionUpload = strtolower(substr(strrchr($this->files->getGet('avatar', 'name'), '.') , 1));
                    if (in_array($extensionUpload, $extensionsValides)){
                        $chemin = "../public/img/users/avatar/" . $this->session->get('id') . "." . $extensionUpload;
                        $resultat = move_uploaded_file($this->files->getGet('avatar', 'tmp_name'), $chemin);
                        if ($resultat){
                            $newavatar = $this->session->get('id')  . "." . $extensionUpload;
                            $sessId = $this->session->get('id');
                            $this->userssDAO->getNewAvatar($newavatar, $sessId);
                            $this->session->set('update_pseudo', 'Le changement de votre photo à bien été pris en compte !');
                            return $this->view->render('editProfile', [
                                'post' => $post
                            ]);
                        }else{
                        $this->session->set('update_picture', 'Erreur durant l\'importation de votre photo de profil !' );}
                    }else{
                      $this->session->set('update_picture', 'Votre photo de profil doit être au format jpg, jpeg, gif ou png !');}
                    }else{
                    $this->session->set('update_picture', 'Votre photo de profil ne doit pas dépasser 2Mo !');}
                }else{
                $this->session->set('update_picture', 'Merci de selectionner une photo !');}
            }
            return $this->view->render('editProfile');
        }
}
