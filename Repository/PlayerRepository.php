<?php
namespace Repository;

use Entity\Duel;
use Entity\Player;

class PlayerRepository extends Repository
{
    public function __construct($db)
    {
        parent::__construct($db);
    }
    
    public function createPlayer(Duel $duel)
    {
        $player = new Player();
        $player->setLife(10)
        ->setDuel_id((int)$duel->getId())
        ->setUser_id((int)$_SESSION['id']);

        $this->insert($player);
        
        return $player;
    }
}

