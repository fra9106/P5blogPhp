<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\User;

class UserssDAO extends DAO
{
    public function buildObject($row)
    {
        $user = new User();
        $user->setId($row['id']);
        $user->setPseudo($row['pseudo']);
        $user->setMail($row['mail']);
        $user->setPass($row['pass']);
        $user->setDroits($row)['droits'];
        $user->setCreateDate($row['create_date_fr']);
        return $user;
    }
   
    public function register(Parameter $post)
    {
        $this->checkUser($post);
        $sql = "INSERT INTO users(pseudo, mail, pass, droits, create_date) VALUES(?, ?, ?, ?, NOW())";
        $this->createQuery($sql, [$post->get('pseudo'), $post->get('mail'), password_hash($post->get('mdp'), PASSWORD_DEFAULT),0]);
    }

    public function checkUser(Parameter $post)
    {
        $sql = 'SELECT COUNT(mail) FROM users WHERE mail = ?';
        $result = $this->createQuery($sql, [$post->get('mail')]);
        $isUnique = $result->fetchColumn();
        if($isUnique) {
            return '<br><p>Oups... ce mail existe déjà, merci d\'en choisir un autre...</p>';
        }
    }

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

    public function getUsersInfos($userId)
    {
        $sql = 'SELECT id, pseudo, mail, pass, droits, DATE_FORMAT(create_date, \'%d/%m/%Y à %Hh%imin%ss\') AS create_date_fr FROM users WHERE id = ?';
        $result = $this->createQuery($sql, [$userId]);
        $user = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($user);
    }

}