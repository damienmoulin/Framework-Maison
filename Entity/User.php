<?php
namespace Entity;

class User  
{
    /**
     *  @var id
     */
    private $id;
    
    /**
     * @var name
     */
    private $name;
        
    /**
     * 
     * @param string $name
     * @return \Entity\User
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    
    /**
     * 
     * @param integer $id
     * @return \Entity\User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    
    /**
     * 
     * @return User/name
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * 
     * @return User/id
     */
    public function getId()
    {
        return $this->id;
    }
        
}

