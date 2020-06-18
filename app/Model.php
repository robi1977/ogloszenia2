<?php 

abstract class Model{
    protected $dbh;
    protected $stsm;

    public function __construct(){
        $this->dbh = new PDO("mysql:host=".DB_HOST.";dbmane=".DB_NAME, DB_USER, DB_PASS);
    }
    
    public function query($query){
        $this->stsm = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type=null){
        if(is_null($type)){
            if(is_int($value)){
                $type = PDO::PARAM_INT;
            } else if(is_bool($value)){
                $type = PDO::PARAM_BOOL;
            } else if(is_null($value)){
                $type = PDO::PARAM_NULL;
            } else {
                $type = PDO::PARAM_STR;
            }
        }

        $this->stsm->bindValue($param, $value, $type);
    }

    public function execute(){
        $this->stsm->execute();
    }

    public function resultSet(){
        $this->execute();
        return $this->stsm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function rowCount(){
        return $this->stsm->rowCount();
    }

    public function lastInsertId(){
        return $this->dbh->lastInsertId();
    }

    public function single(){
        $this->execute();
        return $this->stsm->fetch(PDO::FETCH_ASSOC);
    }
}