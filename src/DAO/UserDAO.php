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
}