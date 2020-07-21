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

    /**
     * recovery articles list by categories
     *
     * @param [type] $catId
     * @return void
     */
    public function articlesByCat($catId)
    {
        $articles = $this->articleDAO->articlesByCat($catId);
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
            $mdp = $this->post->get('mdp');
            $mdp2 = $this->post->get('mdp2');
            if($mdp == $mdp2){
            $errors = $this->validation->validate($post,'User');
            if($this->userssDAO->checkUser($post)) {
                $errors['mail'] = $this->userssDAO->checkUser($post);
            }
            $mail = htmlspecialchars($this->post->get('mail'));
            if (filter_var($mail, FILTER_VALIDATE_EMAIL)){
                if(!$errors) {
                    $this->userssDAO->register($post);
                    $this->session->set('register', 'Votre inscription a bien été prise en compte !');
                }
                return $this->view->render('register', [
                    'post' => $post,
                    'errors' => $errors
                    ]);
                }
                else{
                    $this->session->set('register', 'Adresse mail non valide !');
                }
            }
            else{
                $this->session->set('register', 'Veuillez taper deux mots de passe identiques !');
            }
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
                $this->session->set('mail', $result['result']['mail']);
                $this->session->set('droits', $result['result']['droits']);
                if($this->session->get('droits') === '1') {
                    return $this->view->render('administration');
                }
                    return $this->view->render('home');
                }
                $this->session->set('error_login', 'Le pseudo ou le mot de passe sont incorrects !');
                return $this->view->render('login', [
                    'post'=> $post
                ]);
        }
        return $this->view->render('login');
    }

    public function logout()
    {
        $this->session->stop();
        $this->session->start();
        $this->session->set('logout', 'À bientôt');
    }
}
