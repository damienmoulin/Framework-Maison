<?php
namespace Repository;

use PDO;
use ReflectionProperty;

class Repository
{
    private $db;
    
    public function __construct($db)
    {
        $this->db = $db->getDb();
    }
    
    public function findBy($field = 'id', $value)
    {
        $entityName = 'Entity\\'.$this->getClass();
        
        $$entityName = new $entityName();
        
        $reflect = new \ReflectionClass($$entityName);
        $props = $reflect->getProperties(ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_PRIVATE | ReflectionProperty::IS_PROTECTED);
        
        $attributs = [];
        foreach ($props as $prop) {
            array_push($attributs, strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $prop->getName())));
        }

        $sql = "SELECT ".implode(',', $attributs)." FROM ".strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $this->getClass()))." WHERE ".$field."= :value";
        
        //avec db executer la requete
        $statment = $this->db->prepare($sql);
        $statment->execute(
            [
                ':value' => $value
            ]
        );
        $result = $statment->fetchAll(\PDO::FETCH_ASSOC);
        
        if (count($result) == 1 ) {
            $id = 0;
            //On crée des entitées correspondantes
            $entity = $this->generateEntity($entityName, $result[$id]);
            return $entity;
        } elseif (count($result) > 1){
            $entities = [];
            //Boucle sur les résultats
            foreach ($result as $elem) {
                $entity = $this->generateEntity($entityName, $elem);
                array_push($entities, $entity);
            }
            return $entities;
        }
    }
    
    public function generateEntity($entityName, $result)
    {
        //Création de l'entitée
        $entity = new $entityName();
        
        //Boucle sur les champs
        foreach ($result as $key => $attribut) {
            
            //On coupe au niveau des _ pour reformater le setter
            $a = explode("_", $key);
            
            //Generation des majuscules sur 1er lettre
            foreach ($a as $k => $i) {
                $a[$k] = ucfirst($i);
            }
            
            //Generation du setter
            $method = 'set'.implode($a);
            
            //Appel du setter
            $entity->$method($attribut);
        }
        return $entity;
    }
    
    public function insert($entity)
    {
        //Récuperation du nom de l'entitée
        $entityName = $this->getClass($entity);
                       
        //On récupere les attributs
        $reflect = new \ReflectionClass($entity);
        $props = $reflect->getProperties(ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_PRIVATE | ReflectionProperty::IS_PROTECTED);
        
        $attributs = [];
        $binds = [];
        $values = [];
        
        //On formate le tout pour que les attributs et les values soient aux meme places dans leurs tableaux
        foreach ($props as $prop) {

            //Encodage pour respecter la base de donnée
            $attribut = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $prop->getName()));
            array_push($attributs, $attribut);
            
            //Generation du getter
            $method = 'get'.ucfirst($prop->getName());
            
            //Appel du getter et ajout au tableau
            $value = $entity->$method();
            if ($value == null) {
               $value = 'null';
            }
            array_push($binds, ":".$attribut);
            $values[":".$attribut] = htmlspecialchars($value);
        }

        $prepared = $this->db->prepare("INSERT INTO ".strtolower($entityName)." (".implode(',', $attributs).") VALUES (".implode(',', $binds).")");
        try {
            $prepared->execute($values);
        } catch (\PDOException $e) {
            echo 'Echec d\'enregistrement : '.$e->getMessage();
            exit;
        }
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

