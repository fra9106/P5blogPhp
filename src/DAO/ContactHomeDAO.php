<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\ContactHome;


class ContactHomeDAO extends DAO
{
    private function buildObject($row)
    {
        $message = new ContactHome();
        $message->setId($row['id']);
        $message->setUsername($row['username']);
        $message->setMail($row['mail']);
        $message->setContent($row['content']);
        $message->setCreationDate($row['creation_date_fr']);
        return $message;
    }

    public function addMessage(Parameter $post)
    {
        $sql = 'INSERT INTO homepage(username, mail, content, creation_date) VALUES (?, ?, ?, NOW())';
        $this->createQuery($sql, [$post->get('username'), $post->get('mail'), $post->get('content')]);
    }
}
