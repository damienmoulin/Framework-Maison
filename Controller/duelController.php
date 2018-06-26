<?php
namespace Controller;

use Repository\DuelRepository;
use Repository\PlayerRepository;

class duelController extends Controller
{
    public function __construct($db)
    {
        parent::__construct();
        $this->duelRepository = new DuelRepository($db);
        $this->playerRepository = new PlayerRepository($db);
    }
    
    public function createAction()
    {
        $duel = $this->duelRepository->createDuel();
        $player = $this->playerRepository->createPlayer($duel);
        
        if ($player) {
            header('Location: index.php?r=duel&action=index&=token='.$duel->getToken());
        } else {
            return $this->render('duel/index', ["error" => "Une erreure est survenue"]);
        }
    }
    
    public function indexAction()
    {
        if (empty($_GET['token'])) {
            return $this->render('duel/index', ["error" => "Id ou Token incorrect"]);
        }
        
        $duel_token = $_GET['token'];
       
        $duel = $this->duelRepository->findBy('token', $_GET['token']);
        
        if (!empty($duel)) {
            $players = $this->playerRepository->findBy('duel_id', $duel->getId());
            
            if (count($players) === 1) {
                //Déja inscrit
                if ($players->getUser_id() == intval($_SESSION['id'])) {
                } else {
                    //Place libre
                    //Inscription 
                    $this->playerRepository->createPlayer($duel);
                    
                    //Prévoir un choix random du joueur qui commande
                    $duel->setPlayer_turn($players->getId());
                    header('Location: index.php?r=duel&action=index&=token='.$duel->getToken());
                }
            } elseif (count($players) === 2) {
                foreach ($players as $player) {
                    $me = null;
                    $opponent= null;
                    if ($player->getUser_id() == intval($_SESSION['id'])) {
                        $me = $player;
                    } else {
                        $opponent = $player;
                    }
                }
                
                if ($me === null) {
                    return $this->render('duel/index', ["error" => "Vous ne faites pas partie du combat"]);
                }
                    
                return $this->render('duel/index', 
                    [
                        "player" => $me,
                        "opponent" => $opponent,
                        "duel" => $duel
                    ]);   
            }
        }
    }  
}

