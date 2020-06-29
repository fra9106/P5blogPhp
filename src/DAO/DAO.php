<?php

namespace App\src\DAO;

use PDO;
use Exception;

class DAO
{

    const DB_HOST = 'mysql:host=localhost;dbname=p5blogphp;charset=utf8';
    const DB_USER = 'root';
    const DB_PASS = '';
    
    private $connection;
    
    private function checkConnect()
    {
        
        if($this->connection === null) {
            return $this->getConnect();
        }
        
        return $this->connection;
    }
    
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
    
    protected function createQuery($sql, $parameters = null)
    {
        if($parameters)
        {
            $result = $this->checkConnect()->prepare($sql);
            $result->setFetchMode(PDO::FETCH_CLASS, static::class);
            $result->execute($parameters);
            return $result;
        }
        $result = $this->checkConnect()->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, static::class);
        return $result;
    }
}