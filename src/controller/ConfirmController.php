<?php

namespace App\src\controller;

class ConfirmController extends Controller
{
    /**
     * confirm delete article page (admin)
     *
     * @param [type] $articleId
     * @return void
     */
    public function confirmDeleteArticle($articleId)
    {
        $article = $this->articleDAO->getArticle($articleId);
        return $this->view->render('errors/confirmDeleteArticle', [
            'article' => $article
        ]);
    }

    /**
     * confirm delete comment page (admin)
     *
     * @param [type] $commentId
     * @return void
     */
    public function confirmDeleteComment($commentId)
    {
        $comment = $this->commentDAO->getComment($commentId);
        return $this->view->render('errors/confirmDeleteComment', [
            'comment' => $comment
        ]);
    }

    /**
     * confirm delete  user account page
     *
     * @return void
     */
    public function confirmDeleteAccount()
    {
        return $this->view->render('errors/confirmDeleteUserAccount');
    }

    /**
     * confirm delete user (admin)
     *
     * @param [type] $userId
     * @return void
     */
    public function confirmDeleteUserAdmin($userId)
    {
        $user = $this->userssDAO->getUsersInfos($userId);
        return $this->view->render('errors/confirmDeleteUserAdmin', [
            'user' => $user
        ]);
    }

    /**
     * confirm delete home page message (admin)
     *
     * @param [type] $messageId
     * @return void
     */
    public function confirmDeleteMessageAdmin($messageId)
    {
        $message = $this->messageHomeDAO->messageAdmin($messageId);
        return $this->view->render('errors/confirmDeleteMessageAdmin', [
            'message' => $message
        ]);
    }
}
