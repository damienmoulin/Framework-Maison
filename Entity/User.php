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
     *  @var user_id
     */
    private $userId;
    
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
        
}

