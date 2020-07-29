<?php

namespace App\src\controller;

use App\config\Parameter;

class ConnectController extends Controller
{
    /**
     * login
     *
     * @param Parameter $post
     * @return void
     */
    public function login(Parameter $post)
    {
        if($post->get('submit')) {
            $result = $this->connectDAO->login($post);
            if($result && $result['isPasswordValid']) {
                $this->session->set('login', 'Content de vous revoir ' );
                $this->session->set('id', $result['result']['id']);
                $this->session->set('pseudo', $post->get('pseudo'));
                $this->session->set('mail', $result['result']['mail']);
                $this->session->set('droits', $result['result']['droits']);
                $this->session->set('avatar', $result['result']['avatar']);
                $this->session->set('avatar', $post->get('avatar'));
               
                if($this->session->get('droits') === '1') {
                    return $this->view->render('admin/administration');
                }
                $users = $this->userssDAO->usersListAdmin();
                return $this->view->render('home', [
                    'users' => $users
                ]);
            }
                $this->session->set('error_login', 'Le pseudo ou le mot de passe sont incorrects !');
                return $this->view->render('connect/login', [
                    'post'=> $post
                ]);
        }
        return $this->view->render('connect/login');
    }

    /**
     * logout
     *
     * @return void
     */
    public function logout()
    {
        $this->session->stop();
        $this->session->start();
        $this->session->set('logout', 'À bientôt');
    }

    /**
     * user register
     *
     * @param Parameter $post
     * @return void
     */
    public function register(Parameter $post)
    {
        if($post->get('submit')) {
            $mdp = $this->post->get('mdp');
            $mdp2 = $this->post->get('mdp2');
            if($mdp == $mdp2){
            $errors = $this->validation->validate($post,'User');
            if($this->connectDAO->checkUser($post)) {
                $errors['mail'] = $this->connectDAO->checkUser($post);
            }
            $mail = htmlspecialchars($this->post->get('mail'));
            if (filter_var($mail, FILTER_VALIDATE_EMAIL)){
                if(!$errors) {
                    $this->connectDAO->register($post);
                    $this->session->set('register', 'Votre inscription a bien été prise en compte !');
                }
                return $this->view->render('connect/register', [
                    'post' => $post,
                    'errors' => $errors
                    ]);
                }
                $this->session->set('register', 'Adresse mail non valide !');
            }
            else{
                $this->session->set('register', 'Veuillez taper deux mots de passe identiques !');
            }
        }
        return $this->view->render('connect/register');
    }
}
