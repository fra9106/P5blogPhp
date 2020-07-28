<?php

namespace App\src\DAO;

use App\config\Parameter;

class ConnectDAO extends UserssDAO
{
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
}
