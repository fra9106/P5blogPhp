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
    
    public function addComment(Parameter $post, $articleId)
    {
        if($post->get('submit')) {
            $this->commentDAO->addComment($post, $articleId);
            $this->session->set('add_comment', 'Commentaire ajouté');
           }
            $article = $this->articleDAO->getArticle($articleId);
            $comments = $this->commentDAO->getCommentsArticle($articleId);
            return $this->view->render('single', [
                'article' => $article,
                'comments' => $comments,
                'post' => $post
            ]);
    }
    public function register(Parameter $post)
    {
        return $this->view->render('register');
    }
}