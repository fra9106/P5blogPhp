<?php

namespace App\src\controller;

use App\config\Parameter;

class HomeController extends Controller
{

    /**
     * display home page
     *
     * @return void
     */
    public function home()
    {
        return $this->view->render('home');
    }

    /**
     * add message home page
     *
     * @param Parameter $post
     * @return void
     */
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

    /**
     * list home page messages admin
     *
     * @return void
     */
    public function messagesListAdmin()
    {
        $messages = $this->messageHomeDAO->messagesListAdmin();
        return $this->view->render('admin/messagesListAdmin', [
           'messages' => $messages
        ]);
    }

    /**
     * display home page message by id
     *
     * @param [type] $messageId
     * @return void
     */
    public function messageAdmin($messageId)
    {
        $message = $this->messageHomeDAO->messageAdmin($messageId);
        return $this->view->render('admin/messageAdmin', [
            'message' => $message
        ]);
    }

    /**
     * delete home page message
     *
     * @param [type] $messageId
     * @return void
     */
    public function deleteMessageAdmin($messageId)
    {
        $this->messageHomeDAO->deleteMessageAdmin($messageId);
        $this->session->set('delete_messageAdmin', 'Message supprimé !');
        $messages = $this->messageHomeDAO->messagesListAdmin();
        return $this->view->render('admin/messagesListAdmin', [
           'messages' => $messages
        ]);
    }

    /**
     * display legal page
     *
     * @return void
     */
    public function legalPage()
	{
        return $this->view->render('public/legalNotice');
    }

    /**
     * display admin page
     *
     * @return void
     */
    public function administration()
    {
        return $this->view->render('admin/administration');
    }
}
