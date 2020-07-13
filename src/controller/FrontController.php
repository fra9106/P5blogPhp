<?php

namespace App\src\controller;

use App\config\Parameter;

class FrontController extends Controller
{
   public function home()
    {
        return $this->view->render('home');
    }

    public function articlesList()
    {
        $articles = $this->articleDAO->getArticles();
        return $this->view->render('articlesList', [
           'articles' => $articles
        ]);
    }

    public function article($articleId)
    {
        $article = $this->articleDAO->getArticle($articleId);
        $comments = $this->commentDAO->getCommentsArticle($articleId);
        return $this->view->render('single', [
            'article' => $article,
            'comments' => $comments
        ]);
    }

    public function legalPage()
	{
        return $this->view->render('legalNotice');
    }
    
    public function addComment(Parameter $post, $sessId, $articleId)
    {
        if($post->get('submit')) {
            $errors = $this->validation->validate($post, 'Comment');
            if(!$errors) {
                $sessId = $this->session->get('id');
                $this->commentDAO->addComment($post, $sessId, $articleId);
                $this->session->set('add_comment', 'Commentaire ajouté en attente de validation !');
            }
            $article = $this->articleDAO->getArticle($articleId);
            $comments = $this->commentDAO->getCommentsArticle($articleId);
            return $this->view->render('single', [
                'article' => $article,
                'comments' => $comments,
                'post' => $post,
                'errors' => $errors
            ]);
        }
    }

    public function register(Parameter $post)
    {
        if($post->get('submit')) {
            $errors = $this->validation->validate($post, 'User');
            if($this->userssDAO->checkUser($post)) {
                $errors['mail'] = $this->userssDAO->checkUser($post);
            }
            if(!$errors) {
                $this->userssDAO->register($post);
                $this->session->set('register', 'Votre inscription a bien été effectuée');
                return $this->view->render('login'); 
            }
            return $this->view->render('register', [
                'post' => $post,
                'errors' => $errors
            ]);

        }
        return $this->view->render('register');
    }
   
    public function login(Parameter $post)
    {
        if($post->get('submit')) {
            $result = $this->userssDAO->login($post);
            if($result && $result['isPasswordValid']) {
                $this->session->set('login', 'Content de vous revoir ' );
                $this->session->set('id', $result['result']['id']);
                $this->session->set('pseudo', $post->get('pseudo'));
                $this->session->set('droits', $result['result']['droits']);
                return $this->view->render('home');
            }
            else {
                $this->session->set('error_login', 'Le pseudo ou le mot de passe sont incorrects !');
                return $this->view->render('login', [
                    'post'=> $post
                ]);
            }
        }
        return $this->view->render('login');
    }

    public function logout()
    {
        $this->session->stop();
    }


}