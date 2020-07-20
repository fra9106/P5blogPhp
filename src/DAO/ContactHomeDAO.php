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

    public function messagesListAdmin()
    {
        $sql = 'SELECT id, username, mail, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM homepage ORDER BY creation_date DESC';
        $result = $this->createQuery($sql);
        $messages = [];
        foreach($result as $row){
            $messageId = $row['id'];
            $messages[$messageId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $messages;
    }

    public function messageAdmin($messageId)
    {
        $sql = 'SELECT id, username, mail, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM homepage WHERE id = ?';
        $result = $this->createQuery($sql, [$messageId]);
        $message = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($message);
    
    }
}
