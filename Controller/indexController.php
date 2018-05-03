<?php
namespace Controller;

use Repository\UserRepository;

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
        $this->userRepository->findBy('id', 12);
          
        return $this->render('index');
    }
}

