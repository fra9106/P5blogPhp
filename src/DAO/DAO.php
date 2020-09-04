<?php

namespace App\src\DAO;

use PDO;
use Exception;

class DAO
{
    /**
     * connect db
     */
    const DB_HOST = 'mysql:host=localhost;dbname=p5blogphp;charset=utf8';
    const DB_USER = 'root';
    const DB_PASS = '';
    
    /**
     * check connexion
     *
     * @var [type]
     */
    private $connection;
    
    private function checkConnect()
    {
        
        if($this->connection === null) {
            return $this->getConnect();
        }
        
        return $this->connection;
    }
    
    /**
     * get connect
     *
     * @return void
     */
    private function getConnect()
    {
    
        try{
            $this->connect = new PDO(self::DB_HOST, self::DB_USER, self::DB_PASS);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            return $this->connect;
        }
        
        catch(Exception $errorConnexion)
        {
            die ('Erreur de connection :'.$errorConnexion->getMessage());
        }
        
    }
    
    /**
     * function for prepare or query request
     */
    protected function createQuery($sql, $parameters = null)
    {
        if($parameters)
        {
            $result = $this->checkConnect()->prepare($sql);
            $result->execute($parameters);
            return $result;
        }
        $result = $this->checkConnect()->query($sql);
        return $result;
    }
}
