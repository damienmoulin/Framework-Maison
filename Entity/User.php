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
    private $username;
        
    /**
     * @var string
     */
    private $password;
    
    /**
     * @var string
     */
    private $email;

    /**
     * @var $created_at
     */
    private $created_at;
    
    /**
     * 
     * @var $role
     */
    private $role;
    
    /**
     * @return User/username
     */
    public function getUsername()
    {
        return $this->username;
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
    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $username
     * @return \Entity\User
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }
    
    /**
     * @param integer $id
     * @return \Entity\User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    
    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }  
}

