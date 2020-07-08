<?php

namespace App\src\DAO;

use App\config\Parameter;


class UserDAO extends DAO
{
    public function register(Parameter $post)
    {
        $sql = "INSERT INTO users(pseudo, mail, pass, droits, create_date) VALUES(?, ?, ?, 0, NOW())";
        $this->createQuery($sql, [$post->get('pseudo'), $post->get('mail'), password_hash($post->get('pass'), PASSWORD_BCRYPT)]);
    }

    public function checkUser(Parameter $post)
    {
        $sql = 'SELECT COUNT(mail) FROM users WHERE mail = ?';
        $result = $this->createQuery($sql, [$post->get('mail')]);
        $isUnique = $result->fetchColumn();
        if($isUnique) {
            return '<p>Oups ce mail existe déjà, merci d\'en choisir un autre...</p>';
        }
    }

    public function login(Parameter $post)
    {
        $sql = 'SELECT id, password FROM users WHERE pseudo = ?';
        $data = $this->createQuery($sql, [$post->get('pseudo')]);
        $result = $data->fetch();
        $isPasswordValid = password_verify($post->get('pass'), $result['pass']);
        return [
            'result' => $result,
            'isPasswordValid' => $isPasswordValid
        ];
    }


}

