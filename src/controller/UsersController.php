<?php

namespace App\src\controller;

use App\config\Parameter;

class UsersController extends Controller
{
    /**
     * display profile users page
     *
     * @param [type] $userId
     * @return void
     */
    public function profile($userId)
    {  
        $userId=$this->session->get('id');
        $user=$this->userssDAO->getUsersInfos($userId);
        return $this->view->render('users/profile', [
            'user' => $user
        ]);
    }

    /**
     * update pseudo user
     *
     * @param Parameter $post
     * @return void
     */
    public function updatePseudo(Parameter $post)
    {
        if($post->get('submit')) {
            $errors = $this->validation->validate($post,'User');
            if(!$errors){
            $this->userssDAO->updatePseudo($post, $this->session->get('id'));
            $this->session->set('update_pseudo', 'Le changement de votre pseudo à bien été pris en compte et apparaîtra à votre prochaine connexion !');
        }
            return $this->view->render('users/editProfile', [
                'post' => $post,
                'errors' => $errors
            ]);
        }
        return $this->view->render('users/editProfile');
    
    }

    /**
     * update mail user
     *
     * @param Parameter $post
     * @return void
     */
    public function updateMail(Parameter $post)
    {
        if($post->get('submit')) {
            $errors = $this->validation->validate($post,'User');
            if($this->userssDAO->checkNewMail($post)) {
                $errors['newmail'] = $this->userssDAO->checkNewMail($post);
            }
            if(!$errors) {
            $this->userssDAO->updateMail($post, $this->session->get('id'));
            $this->session->set('update_mail', 'Le changement de votre mail à bien été pris en compte et apparaîtra à votre prochaine connexion !');
            }
           return $this->view->render('users/editProfile', [
                'post' => $post,
                'errors' => $errors
           ]);
        }
        return $this->view->render('users/editProfile');
    }

    /**
     * update password user
     *
     * @param Parameter $post
     * @return void
     */
    public function updatePass(Parameter $post)
    {
        if($post->get('submit')) {
            $errors = $this->validation->validate($post,'User');
            if(!$errors){
            $this->userssDAO->updatePass($post, $this->session->get('id'));
            $this->session->set('update_password', 'Le changement de votre mot de passe à bien été pris en compte !');
            }
            return $this->view->render('users/editProfile', [
                'post' => $post,
                'errors' => $errors
            ]);
        }
        return $this->view->render('users/editProfile');
    }

    /**
     * display profile user
     *
     * @return void
     */
    public function editProfile()
    {  
        $this->session->get('id');
        return $this->view->render('users/editProfile');
    }

    /**
     * delete account user
     *
     * @return void
     */
    public function deleteUserAccount()
    {
        $this->userssDAO->deleteUserAccount($this->session->get('pseudo'));
        $this->session->stop();
        return $this->view->render('home');
    }

    /**
     * list admin users page
     *
     * @return void
     */
    public function usersListAdmin()
    {
        $users = $this->userssDAO->usersListAdmin();
        return $this->view->render('admin/usersListAdmin', [
            'users' => $users
        ]);
    }

    /**
     * delete user (admin)
     *
     * @param [type] $userId
     * @return void
     */
    public function deleteUserAccountAdmin($userId)
    {
        $this->userssDAO->deleteUserAccountAdmin($userId);
        $this->session->set('delete_user', 'Compte supprimé !');
        $users = $this->userssDAO->usersListAdmin();
        return $this->view->render('admin/usersListAdmin', [
            'users' => $users
        ]);
    }

    /**
     * upload picture file
     *
     * @param Parameter $post
     * @param [type] $sessId
     * @return void
     */
    public function getAvatar(Parameter $post, $sessId)
    {
        if($post->get('submit')) {
            if ($this->files->get('avatar') and !empty($this->files->getGet('avatar', 'name'))){
                $tailleMax = 2097152;
                $extensionsValides = array(
                    'jpg',
                    'jpeg',
                    'gif',
                    'png'
                );
                    if ($this->files->getGet('avatar', 'size') <= $tailleMax){
                        $extensionUpload = strtolower(substr(strrchr($this->files->getGet('avatar', 'name'), '.') , 1));
                        if (in_array($extensionUpload, $extensionsValides)){
                            $chemin = "../public/img/users/avatar/" . $this->session->get('id') . "." . $extensionUpload;
                            $resultat = move_uploaded_file($this->files->getGet('avatar', 'tmp_name'), $chemin);
                            if ($resultat){
                                $newavatar = $this->session->get('id')  . "." . $extensionUpload;
                                $sessId = $this->session->get('id');
                                $this->userssDAO->getNewAvatar($newavatar, $sessId);
                                $this->session->set('update_pseudo', 'Le changement de votre photo à bien été pris en compte !');
                                return $this->view->render('users/editProfile', [
                                    'post' => $post
                                ]);
                            }
                            $this->session->set('update_picture', 'Erreur durant l\'importation de votre photo de profil !' );
                   
                    return $this->view->render('users/editProfile', [
                        'post' => $post
                    ]);
                }   $this->session->set('update_picture', 'Votre photo de profil doit être au format jpg, jpeg, gif ou png !');
                    
                return $this->view->render('users/editProfile', [
                    'post' => $post
                ]);
            }    $this->session->set('update_picture', 'Votre photo de profil ne doit pas dépasser 2Mo !');
                
            return $this->view->render('users/editProfile', [
                'post' => $post
            ]);
        }    $this->session->set('update_picture', 'Merci de selectionner une photo !');
            
        }
        return $this->view->render('users/editProfile');
    }   
}
