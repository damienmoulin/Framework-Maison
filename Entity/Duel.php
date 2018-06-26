<?php
namespace Entity;

class Duel
{
    /**
     * 
     * @var $id
     */
    private $id;
    
    /**
     * 
     * @var $token
     */
    private $token;
    
    /**
     * 
     * @var $round
     */
    private $round;
    
    /**
     * 
     * @var $winner
     */
    private $winner;
    
    /**
     * 
     * @var $status
     */
    private $status;
    
    /**
     * 
     * @var $created_at
     */
    private $created_at;
    
    /**
     * 
     * @var $player_turn
     */
    private $player_turn;
    
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
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return mixed
     */
    public function getRound()
    {
        return $this->round;
    }

    /**
     * @return mixed
     */
    public function getWinner()
    {
        return $this->winner;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * @return mixed
     */
    public function getPlayer_turn()
    {
        return $this->player_turn;
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
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @param mixed $round
     */
    public function setRound($round)
    {
        $this->round = $round;
        return $this;
    }

    /**
     * @param mixed $winner
     */
    public function setWinner($winner)
    {
        $this->winner = $winner;
        return $this;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
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
     * @param mixed $player_turn
     */
    public function setPlayer_turn($player_turn)
    {
        $this->player_turn = $player_turn;
        return $this;
    }
}

