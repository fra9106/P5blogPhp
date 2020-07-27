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
        return $this->view->render('error_404');
    }

    /**
     * 500 error
     *
     * @return void
     */
    public function errorServer()
    {
        return $this->view->render('error_500');
    }
}
