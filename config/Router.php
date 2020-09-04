<?php

namespace App\config;
use App\src\controller\UsersController;
use App\src\controller\ErrorController;
use App\src\controller\HomeController;
use App\src\controller\ConfirmController;
use App\src\controller\ArticlesController;
use App\src\controller\CommentsController;
use App\src\controller\ConnectController;
use App\src\model\View;
use Exception;

class Router
{
    private $frontController;
    private $errorController;
    private $backController;
    private $confirmController;
    private $articlesController;
    private $commentsController;
    private $connectController;
    private $homeController;
    private $request;
    protected $view;

    public function __construct()
    {
        $this->request = new Request();
        $this->frontController = new HomeController();
        $this->backController = new UsersController();
        $this->errorController = new ErrorController();
        $this->confirmController = new ConfirmController();
        $this->articlesController = new ArticlesController();
        $this->commentsController = new CommentsController();
        $this->connectController = new ConnectController();
        $this->homeController = new HomeController();
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
                    $this->articlesController->article($this->request->getGet()->get('articleId'));
                }
                elseif ($route === 'addArticle'){
                    if (!$this->session->get('droits') || (!$this->session->get('droits', 1))){
                        return $this->view->render('login');
                    }
                    $this->articlesController->addArticle($this->request->getPost());
                }
                elseif ($route === 'addComment'){
                    $this->commentsController->addComment($this->request->getPost(),$this ->session->get('id'), $this->request->getGet()->get('articleId'));
                }
                elseif ($route === 'commentsListAdmin'){
                    if (!$this->session->get('droits') || (!$this->session->get('droits', 1))){
                        return $this->view->render('login');
                    }
                    $this->commentsController->commentsListAdmin();
                }
                elseif($route === 'validComment'){
                    if (!$this->session->get('droits') || (!$this->session->get('droits', 1))){
                        return $this->view->render('login');
                    }
                    $this->commentsController->validComment($this->request->getGet()->get('commentId'));
                }
                elseif ($route=== 'usersListAdmin'){
                    if (!$this->session->get('droits') || (!$this->session->get('droits', 1))){
                        return $this->view->render('login');
                    }
                    $this->backController->usersListAdmin();
                }
                elseif ($route === 'confirmDeleteUserAdmin'){
                    $this->confirmController->confirmDeleteUserAdmin($this->request->getGet()->get('userId'));
                }
                elseif ( $route === 'deleteUserAccountAdmin'){
                    if (!$this->session->get('droits') || (!$this->session->get('droits', 1))){
                        return $this->view->render('login');
                    }
                    $this->backController->deleteUserAccountAdmin($this->request->getGet()->get('userId'));
                }
                elseif ($route === 'articlesListAdmin'){
                    if (!$this->session->get('droits') || (!$this->session->get('droits', 1))){
                        return $this->view->render('login');
                    }
                    $this->articlesController->articlesListAdmin();
                }
                elseif ($route === 'editArticleAdmin'){
                    if (!$this->session->get('droits') || (!$this->session->get('droits', 1))){
                        return $this->view->render('login');
                    }
                    $this->articlesController->editArticleAdmin($this->request->getPost(),$this->request->getGet()->get('articleId'));
                }
                elseif ( $route === 'deleteArticleAdmin'){
                    if (!$this->session->get('droits') || (!$this->session->get('droits', 1))){
                        return $this->view->render('login');
                    }
                    $this->articlesController->deleteArticleAdmin($this->request->getGet()->get('articleId'));
                }
                elseif ($route === 'legalPage'){
                    $this->frontController->legalPage();
                }
                elseif ($route === 'confirmDeleteArticle'){
                    $this->confirmController->confirmDeleteArticle($this->request->getGet()->get('articleId'));
                }
                elseif ($route === 'confirmDeleteComment'){
                    $this->confirmController->confirmDeleteComment($this->request->getGet()->get('commentId'));
                }
                elseif ($route === 'deleteCommentAdmin'){
                    if (!$this->session->get('droits') || (!$this->session->get('droits', 1))){
                        return $this->view->render('login');
                    }
                    $this->commentsController->deleteCommentAdmin($this->request->getGet()->get('commentId'));
                }
                elseif ($route === 'articlesList'){
                    $this->articlesController->articlesList();
                }
                elseif ($route === 'articlesByCat'){
                    $this->articlesController->articlesByCat($this->request->getGet()->get('id_category'));
                }
                elseif($route === 'register'){
                    $this->connectController->register($this->request->getPost());
                }
                elseif($route === 'login'){
                    $this->connectController->login($this->request->getPost());
                }
                elseif($route === 'logout'){
                    $this->connectController->logout();
                }
                elseif($route === 'profile'){
                    $this->backController->profile($this->request->getGet()->get('userId'));
                }
                elseif ($route === 'getAvatar'){
                    $this->backController->getAvatar($this->request->getPost('avatar'),$this->session->get('id'));
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
                    $this->confirmController->confirmDeleteAccount();
                }
                elseif($route === 'administration'){
                    if (!$this->session->get('droits') || (!$this->session->get('droits', 1))){
                        return $this->view->render('login');
                    }
                    $this->homeController->administration();
                }
                elseif ($route === 'addMessage'){
                    $this->frontController->addMessage($this->request->getPost());
                }
                elseif  ($route === 'messagesListAdmin'){
                    if (!$this->session->get('droits') || (!$this->session->get('droits', 1))){
                        return $this->view->render('login');
                    }
                    $this->frontController->messagesListAdmin();
                    }
                elseif  ($route === 'messageAdmin'){
                    if (!$this->session->get('droits') || (!$this->session->get('droits', 1))){
                        return $this->view->render('login');
                    }
                    $this->frontController->messageAdmin($this->request->getGet()->get('messageId'));
                    }
                    elseif($route === 'confirmDeleteMessage'){
                        $this->confirmController->confirmDeleteMessageAdmin($this->request->getGet()->get('messageId'));
                    }
                    elseif ( $route === 'deleteMessageAdmin'){
                        if (!$this->session->get('droits') || (!$this->session->get('droits', 1))){
                            return $this->view->render('login');
                        }
                        $this->frontController->deleteMessageAdmin($this->request->getGet()->get('messageId'));
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
