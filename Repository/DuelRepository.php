<?php
namespace Repository;

use Entity\Duel;
use Entity\Player;

class DuelRepository extends Repository
{
    public function __construct($db)
    {
        parent::__construct($db);
    }
    
    public function createDuel()
    {
        $token = bin2hex(openssl_random_pseudo_bytes(60));
        $duel = new Duel();
        $duel
            ->setCreated_at((new \DateTime())->format('Y/m/d H:i:s'))
            ->setRound(0)
            ->setStatus(0)
            ->setToken($token);
        
        $this->insert($duel);

        $duel = $this->findBy('token', $token);
        
        return $duel;
    }
}

