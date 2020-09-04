<?php

namespace App\src\controller;

class ErrorController extends Controller
{
    /**
     * 404 error
     *
     * @return void
     */
    public function errorNotFound()
    {
        return $this->view->render('errors/error_404');
    }

    /**
     * 500 error
     *
     * @return void
     */
    public function errorServer()
    {
        return $this->view->render('errors/error_500');
    }
}
