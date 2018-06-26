<?php
namespace Entity;

class Player
{
    /**
     * 
     * @var $id
     */
    private $id;
    
    /**
     * 
     * @var $user_id
     */
    private $user_id;
    
    /**
     * 
     * @var $duel_id
     */
    private $duel_id;
    
    /**
     * 
     * @var $life
     */
    private $life;
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getDuel_id()
    {
        return $this->duel_id;
    }

    /**
     * @return mixed
     */
    public function getLife()
    {
        return $this->life;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param mixed $user_id
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @param mixed $duel_id
     */
    public function setDuel_id($duel_id)
    {
        $this->duel_id = $duel_id;
        return $this;
    }

    /**
     * @param mixed $life
     */
    public function setLife($life)
    {
        $this->life = $life;
        return $this;
    }  
}

