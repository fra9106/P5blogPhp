<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\User;

class UserssDAO extends DAO
{
    /**
     * builder user object
     *
     * @param [type] $row
     * @return void
     */
    public function buildObject($row)
    {
        $user = new User();
        $user->setId($row['id']);
        $user->setPseudo($row['pseudo']);
        $user->setMail($row['mail']);
        $user->setPass($row['pass']);
        $user->setDroits($row['droits']);
        $user->setAvatar($row['avatar']);
        $user->setCreateDate($row['create_date_fr']);
        return $user;
    }
   
    /**
     * user register
     *
     * @param Parameter $post
     * @return void
     */
    public function register(Parameter $post)
    {
        $this->checkUser($post);
        $sql = "INSERT INTO users(pseudo, mail, pass, droits, avatar, create_date) VALUES(?, ?, ?, ?, ?, NOW())";
        $this->createQuery($sql, [$post->get('pseudo'), $post->get('mail'), password_hash($post->get('mdp'), PASSWORD_DEFAULT),0,'default.jpg']);
    }

    /**
     * check user mail
     *
     * @param Parameter $post
     * @return void
     */
    public function checkUser(Parameter $post)
    {
        $sql = 'SELECT COUNT(mail) FROM users WHERE mail = ?';
        $result = $this->createQuery($sql, [$post->get('mail')]);
        $isUnique = $result->fetchColumn();
        if($isUnique) {
            return '<br><p>Oups... ce mail existe déjà, merci d\'en choisir un autre...</p>';
        }
        
    }

    /**
     * login
     *
     * @param Parameter $post
     * @return void
     */
    public function login(Parameter $post)
    {
        $sql = 'SELECT * FROM users WHERE pseudo = ?';
        $data = $this->createQuery($sql, [$post->get('pseudo')]);
        $result = $data->fetch();
        $isPasswordValid = password_verify($post->get('mdp'), $result['pass']);
        return [
            'result' => $result,
            'isPasswordValid' => $isPasswordValid
        ];
    }

    /**
     * recovery user infos by Id (profile)
     *
     * @param [type] $userId
     * @return void
     */
    public function getUsersInfos($userId)
    {
        $sql = 'SELECT id, pseudo, mail, pass, droits, avatar, DATE_FORMAT(create_date, \'%d/%m/%Y à %Hh%imin%ss\') AS create_date_fr FROM users WHERE id = ?';
        $result = $this->createQuery($sql, [$userId]);
        $user = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($user);
    }

    /**
     * update pseudo
     *
     * @param Parameter $post
     * @param [type] $pseudo
     * @return void
     */
    public function updatePseudo(Parameter $post, $pseudo)
    {
        $sql = 'UPDATE users SET pseudo = ? WHERE id = ?';
        $this->createQuery($sql,[$post->get('newpseudo'), $pseudo]);
    }

    /**
     * check mail updated
     *
     * @param [type] $post
     * @return void
     */
    public function checkNewMail($post)
    {
        $sql = 'SELECT COUNT(mail) FROM users WHERE mail = ?';
        $result = $this->createQuery($sql, [$post->get('newmail')]);
        $isUnique = $result->fetchColumn();
        if($isUnique) {
            return '<br><p>Oups... ce mail existe déjà, merci d\'en choisir un autre...</p>';
        }
    }

    /**
     * upload picture file
     *
     * @param [type] $newavatar
     * @param [type] $sessId
     * @return void
     */
    public function getNewAvatar($newavatar, $sessId)
    {
        $sql = 'UPDATE users SET avatar = ? WHERE id = ?';
        $this->createQuery($sql,[$newavatar, $sessId]);
        
    }

    /**
     * update mail
     *
     * @param Parameter $post
     * @param [type] $mail
     * @return void
     */
    public function updateMail(Parameter $post, $mail)
    {
        $this->checkNewMail($post);
        $sql = 'UPDATE users SET mail = ? WHERE id = ?';
        $this->createQuery($sql,[$post->get('newmail'), $mail]);
    }

    /**
     * update password
     *
     * @param Parameter $post
     * @param [type] $id_user
     * @return void
     */
    public function updatePass(Parameter $post, $id_user)
    {
        $sql = 'UPDATE users SET pass = ? WHERE id = ?';
        $this->createQuery($sql, [password_hash($post->get('newpass'), PASSWORD_DEFAULT), $id_user]);
    }

    /**
     * delete account (user)
     *
     * @param [type] $pseudo
     * @return void
     */
    public function deleteUserAccount($pseudo)
    {
        $sql = 'DELETE FROM users WHERE pseudo = ?';
        $this->createQuery($sql, [$pseudo]);
    }

    /**
     * user list admin
     *
     * @return void
     */
    public function usersListAdmin()
    {
        $sql = 'SELECT id, pseudo, mail, pass, droits, avatar, DATE_FORMAT(create_date, \'%d/%m/%Y à %Hh%imin%ss\') AS create_date_fr FROM users';
        $result = $this->createQuery($sql);
        $users = [];
        foreach($result as $row){
            $userId = $row['id'];
            $users[$userId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $users;
    }

    /**
     * confirm delete user admin
     *
     * @param [type] $userId
     * @return void
     */
    public function confirmDeleteUserAdmin($userId)
    {
        $sql = 'SELECT id, pseudo, mail, pass, droits, avatar, DATE_FORMAT(create_date, \'%d/%m/%Y à %Hh%imin%ss\') AS create_date_fr FROM users WHERE id = ?  '; 
        $result = $this->createQuery($sql, [$userId]);
        $user = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($user);
    }

    /**
     * delete user account admin
     *
     * @param [type] $userId
     * @return void
     */
    public function deleteUserAccountAdmin($userId)
    {
        $sql = 'DELETE FROM users WHERE id = ?';
        $this->createQuery($sql, [$userId]);
    }
}
