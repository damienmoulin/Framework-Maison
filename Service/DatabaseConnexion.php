<?php
namespace Service;

class DatabaseConnexion
{
    private $db;
    private $host;
    private $dbname;
    private $dsn;
    private $user;
    private $password;
    
    public function __construct($name, $databasesConf)
    {
        $this->name = $name;
        $this->dbname = $databasesConf[$name]['dbname'];
        $this->user = $databasesConf[$name]['user'];
        $this->password = $databasesConf[$name]['password'];
        $this->dsn = 'mysql:dbname='.$databasesConf[$name]['dbname'].';host='.$databasesConf[$name]['host'];
        $this->db = new \PDO($this->dsn, $this->user, $this->password);
        
        return $this->db;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getDb()
    {
        return $this->db;
    }
    
    public function getDbName()
    {
        return $this->dbname;
    }
}

