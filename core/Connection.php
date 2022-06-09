<?php

namespace core;

use PDO;

class Connection{ 

    protected $pdo;
    protected $driver;
    protected $host;
    protected $database;
    protected $user;
    protected $password;
    
    public function __construct(){

        $configuration = require 'config/database.php';
        
        $this->driver = $configuration['driver'];
        $this->host = $configuration['host'];
        $this->database = $configuration['database'];
        $this->user = $configuration['user'];
        $this->password = $configuration['password'];
        
        try {

            $this->pdo = new PDO($this->driver .':host='.$this->host.';dbname='.$this->database, $this->user, $this->password, 
                array(
                    PDO::MYSQL_ATTR_LOCAL_INFILE => TRUE
                )
            );

            $this->pdo->exec("SET CHARACTER SET utf8");

        } catch (PDOException $e) {

            echo "Error al conectar a la base de datos!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function  __destruct() {
        
        $this->pdo = NULL;
    }
} 

?> 