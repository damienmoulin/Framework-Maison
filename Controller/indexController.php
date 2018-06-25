<?php
namespace Controller;

use Repository\UserRepository;
use Entity\User;

class indexController extends Controller
{
    private $userRepository;
    
    public function __construct($db)
    {
        parent::__construct();
        $this->userRepository = new UserRepository($db);
    }
    
    public function indexAction()
    {
        //$this->userRepository->findBy('name', 'thomas');
          
        $user = new User();
        $user->setName('george');
        $user->setCategory(1);
        
        $this->userRepository->insert($user);
        //return $this->render('index');
    }
}

