<?php
namespace Entity;

class User  
{
    /**
     *  @var integer
     */
    private $id;
    
    /**
     * @var string
     */
    private $name;
        
    /**
     * 
     * @var string
     */
    private $category;
    
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
     * @param string $category
     * @return \Entity\User
     */
    public function setCategory($category)
    {
        $this->category = $category;
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
    
    /**
     *
     * @return User/category
     */
    public function getCategory()
    {
        return $this->category;
    }
        
}

