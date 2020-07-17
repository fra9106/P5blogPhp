<?php

namespace App\config;
use App\src\controller\BackController;
use App\src\controller\ErrorController;
use App\src\controller\FrontController;
use App\src\model\View;
use Exception;

class Router
{
    private $frontController;
    private $errorController;
    private $backController;
    private $request;
    protected $view;

    public function __construct()
    {
        $this->request = new Request();
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();
        $this->session = $this->request->getSession();
        $this->view = new View();
    }

    public function run()
    { 
        $route = $this->request->getGet()->get('route');
        try{
            if(isset($route))
            {
                if($route === 'article'){
                    $this->frontController->article($this->request->getGet()->get('articleId'));
                }
                elseif ($route === 'addArticle'){
                    if (!$this->session->get('droits') || (!$this->session->get('droits', 1))){
                        return $this->view->render('login');
                    }
                    else{
                    $this->backController->addArticle($this->request->getPost());
                    }
                }
                elseif ($route === 'addComment'){
                    $this->frontController->addComment($this->request->getPost(),$this ->session->get('id'), $this->request->getGet()->get('articleId'));
                }
                elseif ($route === 'commentsListAdmin'){
                    if (!$this->session->get('droits') || (!$this->session->get('droits', 1))){
                        return $this->view->render('login');
                    }
                    else{
                    $this->backController->commentsListAdmin();
                    }
                }
                elseif($route === 'validComment'){
                    if (!$this->session->get('droits') || (!$this->session->get('droits', 1))){
                        return $this->view->render('login');
                    }
                    else{
                    $this->backController->validComment($this->request->getGet()->get('commentId'));
                    }
                }
                elseif ($route=== 'usersListAdmin'){
                    if (!$this->session->get('droits') || (!$this->session->get('droits', 1))){
                        return $this->view->render('login');
                    }
                    else{
                    $this->backController->usersListAdmin();
                    } 
                }
                elseif ($route === 'confirmDeleteUserAdmin'){
                    $this->backController->confirmDeleteUserAdmin($this->request->getGet()->get('userId'));
                }
                elseif ( $route === 'deleteUserAccountAdmin'){
                    if (!$this->session->get('droits') || (!$this->session->get('droits', 1))){
                        return $this->view->render('login');
                    }
                    else{
                    $this->backController->deleteUserAccountAdmin($this->request->getGet()->get('userId'));
                    }
                }
                elseif ($route === 'articlesListAdmin'){
                    if (!$this->session->get('droits') || (!$this->session->get('droits', 1))){
                        return $this->view->render('login');
                    }
                    else{
                    $this->backController->articlesListAdmin();}
                }
                elseif ($route === 'editArticleAdmin'){
                    if (!$this->session->get('droits') || (!$this->session->get('droits', 1))){
                        return $this->view->render('login');
                    }
                    else{
                    $this->backController->editArticleAdmin($this->request->getPost(),$this->request->getGet()->get('articleId'));
                    }
                }
                elseif ( $route === 'deleteArticleAdmin'){
                    if (!$this->session->get('droits') || (!$this->session->get('droits', 1))){
                        return $this->view->render('login');
                    }
                    else{
                    $this->backController->deleteArticleAdmin($this->request->getGet()->get('articleId'));
                    }
                }
                elseif ($route === 'legalPage'){
                    $this->frontController->legalPage();
                }
                elseif ($route === 'confirmDeleteArticle'){
                    $this->backController->confirmDeleteArticle($this->request->getGet()->get('articleId'));
                }
                elseif ($route === 'confirmDeleteComment'){
                    $this->backController->confirmDeleteComment($this->request->getGet()->get('commentId'));
                }
                elseif ($route === 'deleteCommentAdmin'){
                    if (!$this->session->get('droits') || (!$this->session->get('droits', 1))){
                        return $this->view->render('login');
                    }
                    else{
                    $this->backController->deleteCommentAdmin($this->request->getGet()->get('commentId'));
                    }
                }
                elseif ($route === 'articlesList'){
                    $this->frontController->articlesList();
                }
                elseif($route === 'register'){
                    $this->frontController->register($this->request->getPost());
                }
                elseif($route === 'login'){
                    $this->frontController->login($this->request->getPost());
                }
                elseif($route === 'logout'){
                    $this->frontController->logout();
                }
                elseif($route === 'profile'){
                    $this->backController->profile($this->request->getGet()->get('userId'));
                }
                elseif ($route === 'editProfile'){
                    $this->backController->editProfile($this->request->getGet()->get('id'));
                }
                elseif($route === 'updatePseudo'){
                    $this->backController->updatePseudo($this->request->getPost('newpseudo'),$this->session->get('id'));
                }
                elseif($route === 'updateMail'){
                    $this->backController->updateMail($this->request->getPost('newmail'),$this->session->get('id'));
                }
                elseif($route === 'updatePass'){
                    $this->backController->updatePass($this->request->getPost());
                }
                elseif($route === 'deleteUserAccount'){
                    $this->backController->deleteUserAccount();
                }
                elseif($route === 'confirmDeleteAccount'){
                    $this->backController->confirmDeleteAccount();
                }
                elseif($route === 'administration'){
                    if (!$this->session->get('droits') || (!$this->session->get('droits', 1))){
                        return $this->view->render('login');
                    }
                    else{
                    $this->backController->administration();
                    }
                }
                else{
                    $this->errorController->errorNotFound();
                }
            }
            else{
                $this->frontController->home();
            }
        }
        catch (Exception $e)
        {
            $this->errorController->errorServer();
        }
    }
}
