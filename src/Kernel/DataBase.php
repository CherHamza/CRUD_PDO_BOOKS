<?php
// DESIGN PATERN SINGLETON(UNE CLASSE)
namespace hamza\pdo\Kernel;

use PDO;
use PDOException;

use hamza\pdo\Configuration\Config;



class DataBase extends PDO {

    private static $instance = null;

    private function __construct()
    {
        $dsn = 'mysql:dbname=' . Config::DBNAME . ';host=' . CONFIG::DBHOST;

        try {
            parent::__construct($dsn, CONFIG::DBUSER, CONFIG::DBPASS);
            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_CLASS);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Oups !!! Une erreur est survenue';
            die();
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    

   

}