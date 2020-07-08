<?php

namespace App\config;
use App\src\controller\BackController;
use App\src\controller\ErrorController;
use App\src\controller\FrontController;
use Exception;

class Router
{
    private $frontController;
    private $errorController;
    private $backController;
    private $request;

    public function __construct()
    {
        $this->request = new Request();
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();
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
                    $this->backController->addArticle($this->request->getPost());
                }
                elseif ($route === 'addComment'){
                    $this->frontController->addComment($this->request->getPost(),$this->request->getGet()->get('articleId'));
                }
                elseif ($route === 'commentsListAdmin'){
                    $this->backController->commentsListAdmin();
                }
                elseif($route === 'validComment'){
                    $this->backController->validComment($this->request->getGet()->get('commentId'));
                }
                elseif ($route === 'articlesListAdmin'){
                    $this->backController->articlesListAdmin();
                }
                elseif ($route === 'editArticleAdmin'){
                    $this->backController->editArticleAdmin($this->request->getPost(),$this->request->getGet()->get('articleId'));
                }
                elseif ( $route === 'deleteArticleAdmin'){
                    $this->backController->deleteArticleAdmin($this->request->getGet()->get('articleId'));
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
                    $this->backController->deleteCommentAdmin($this->request->getGet()->get('commentId'));
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