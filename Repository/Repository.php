<?php
namespace Repository;

use ReflectionProperty;

class Repository
{
    private $db;
    
    public function __construct($db)
    {
        $this->db = $db;
    }
    
    public function findBy($field, $value)
    {
        $entityName = 'Entity\\'.$this->getClass();
        
        $$entityName = new $entityName();
        
        $reflect = new \ReflectionClass($$entityName);
        $props = $reflect->getProperties(ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_PRIVATE | ReflectionProperty::IS_PROTECTED);
        
        $attributs = [];
        foreach ($props as $prop) {
            array_push($attributs, strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $prop->getName())));
        }

        $sql = "SELECT ".implode(',', $attributs)." WHERE ".$field."=".$value;
        var_dump($sql);
        //avec db executer la requete
    }
    
    public function insert()
    {
        
    }
    
    public function update()
    {
        
    }
    
    //Recupere le nom du Repository enfant
    public function getClass()
    {
        return substr(explode('\\', get_class($this))[1],0,-10);
    }
}

