<?php

namespace App\src\DAO;

use PDO;
use Exception;

class DAO
{
    //Nos constantes
    const DB_HOST = 'mysql:host=localhost;dbname=p5blogphp;charset=utf8';
    const DB_USER = 'root';
    const DB_PASS = '';
    
    private $connection;
    
    private function checkConnect()
    {
        //Vérifie si la connexion est nulle et fait appel à getConnection()
        if($this->connection === null) {
            return $this->getConnect();
        }
        //Si la connexion existe, elle est renvoyée, inutile de refaire une connexion
        return $this->connection;
    }
    
    //Méthode de connexion à notre base de données
    private function getConnect()
    {
        //Tentative de connexion à la base de données
        try{
            $this->connect = new PDO(self::DB_HOST, self::DB_USER, self::DB_PASS);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //On renvoie la connexion
            return $this->connect;
        }
        //On lève une erreur si la connexion échoue
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