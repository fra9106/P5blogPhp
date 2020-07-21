<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\ContactHome;


class ContactHomeDAO extends DAO
{
    /**
     * builder message objet
     *
     * @param [type] $row
     * @return void
     */
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

    /**
     * add message
     *
     * @param Parameter $post
     * @return void
     */
    public function addMessage(Parameter $post)
    {
        $sql = 'INSERT INTO homepage(username, mail, content, creation_date) VALUES (?, ?, ?, NOW())';
        $this->createQuery($sql, [$post->get('username'), $post->get('mail'), $post->get('content')]);
    }

    /**
     * recovery message list admin
     *
     * @return void
     */
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

    /**
     * recovery message by Id
     *
     * @param [type] $messageId
     * @return void
     */
    public function messageAdmin($messageId)
    {
        $sql = 'SELECT id, username, mail, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM homepage WHERE id = ?';
        $result = $this->createQuery($sql, [$messageId]);
        $message = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($message);
    }

    /**
     * delete message by Id
     *
     * @param [type] $messageId
     * @return void
     */
    public function deleteMessageAdmin($messageId)
    {
        $sql = 'DELETE FROM homepage WHERE id = ?';
        $this->createQuery($sql, [$messageId]);
    }

}
