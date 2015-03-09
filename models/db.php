<?php

require __DIR__. '/../functions/sql.php';

class DB
{
    private $dbh;
    private $className = 'stdClass';
    private $error = 'Не удалось выполнить запрос к БД';

    public function __construct()
    {
        try {
            $this->dbh = new PDOConfig;
        }
        catch(PDOException $e){

            throw new HTTP403Exception('Не удалось подключиться к БД !');
        }
    }

    public function setClassName($class)
    {
        $this->className = $class;
    }

    public function query($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);

        if ($sth->execute($params)) {
            return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
        }
        else{
            throw new HTTP403Exception($this->error);
        }
    }

    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        if ($res = $sth->execute($params)){
            return $res;
        }
        else{
            throw new HTTP403Exception($this->error);
        }
    }

    public function lastInsertId()
    {
         if ($res = $this->dbh->lastInsertId()){
             return $res;
         }
         else{
             throw new HTTP403Exception($this->error);
         }
    }

}