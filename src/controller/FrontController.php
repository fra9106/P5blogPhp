<?php

namespace App\src\controller;

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
        $comments = $this->commentDAO->getCommentsFromArticle($articleId);
        return $this->view->render('single', [
            'article' => $article,
            'comments' => $comments
        ]);
    }

    public function legalPage()
	{
        return $this->view->render('legalNotice');
	}
}