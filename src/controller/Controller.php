<?php

namespace App\src\controller;

use App\config\Request;
use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;
use App\src\model\View;
use App\src\constraint\Validation;
use App\src\DAO\ContactHomeDAO;
use App\src\DAO\UserssDAO;

abstract class Controller
{
    protected $articleDAO;
    protected $commentDAO;
    protected $view;
    private $request;
    protected $get;
    protected $post;
    protected $session;
    protected $validation;
    protected $userssDAO;
    protected $messageHomeDAO;
   

    public function __construct()
    {
        $this->articleDAO = new ArticleDAO();
        $this->commentDAO = new CommentDAO();
        $this->view = new View();
        $this->request = new Request();
        $this->get = $this->request->getGet();
        $this->post = $this->request->getPost();
        $this->session = $this->request->getSession();
        $this->validation = new Validation();
        $this->userssDAO = new UserssDAO();
        $this->messageHomeDAO = new ContactHomeDAO();
    }
}