<?php

namespace Benoi\GestionDeProjet\Kernel;
use Benoi\GestionDeProjet\Configuration\Config;

class Db extends \PDO{
    private static $instance = null;

    protected function __construct(){
        try {
            parent::__construct(Config::DSN, Config::USER, Config::PASSWORD);
        }catch(\PDOException $e){
            die($e->getMessage());
        }


    }
    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new static();
        }
        return self::$instance;
    }

    public static function getResults($sql,$classname){
        $pdostatement = self::getInstance()->query($sql);
        return $pdostatement->fetchAll(\PDO::FETCH_CLASS, $classname);
    }

    public static function getResult($sql){
        return self::getInstance()->exec($sql);
    }
}