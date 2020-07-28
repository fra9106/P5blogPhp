<?php

namespace App\src\controller;

use App\config\Parameter;

class ArticlesController extends Controller
{
    /**
     * add article admin
     *
     * @param Parameter $post
     * @return void
     */
    public function addArticle(Parameter $post)
    {
        if($post->get('submit')) {
        $errors = $this->validation->validate($post, 'Article');
           if(!$errors) {
                $this->articleDAO->addArticle($post, $this->session->get('id'));
                $this->session->set('add_article', 'Nouvel article ajouté !');
                return header('Location:index.php?route=articlesListAdmin');
            }
                return $this->view->render('add_article', [
                'post' => $post,
                'errors' => $errors
            ]);
        }
        return $this->view->render('add_article');
    }

    /**
     * list admin articles page
     *
     * @return void
     */
    public function articlesListAdmin(){
        $articles = $this->articleDAO->getArticles();
        return $this->view->render('articlesListAdmin', [
           'articles' => $articles
        ]);
    }

    /**
     * edit article admin
     *
     * @param Parameter $post
     * @param [type] $articleId
     * @return void
     */
    public function editArticleAdmin(Parameter $post, $articleId)
    {
        $article = $this->articleDAO->getArticle($articleId);
        if($post->get('submit')){
            $this->articleDAO->articleEditAdmin($post, $articleId);
            $this->session->set('articlesListAdmin', 'Article modifié !');
            $articles = $this->articleDAO->getArticles();
            return $this->view->render('articlesListAdmin', [
                'articles' => $articles
            ]);
        }    
        return $this->view->render('edit_ArticleAdmin', [
            'article' => $article
        ]);
    }

    /**
     * delete article (admin)
     *
     * @param [type] $articleId
     * @return void
     */
    public function deleteArticleAdmin($articleId)
    {
        $this->articleDAO->deleteArticle($articleId);
        $this->session->set('delete_articleAdmin', 'Article supprimé !');
        $articles = $this->articleDAO->getArticles();
        return $this->view->render('articlesListAdmin', [
           'articles' => $articles
        ]);
    }

    /**
     * display all articles
     *
     * @return void
     */
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

    /**
     * display article by id
     *
     * @param [type] $articleId
     * @return void
     */
    public function article($articleId)
    {
        $article = $this->articleDAO->getArticle($articleId);
        $comments = $this->commentDAO->getCommentsArticle($articleId);
        return $this->view->render('single', [
            'article' => $article,
            'comments' => $comments
        ]);
    }
}
