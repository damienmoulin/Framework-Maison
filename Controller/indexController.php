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
        $this->userRepository->findBy('name', 'thomas');
          
        $this->userRepository->insert();
        return $this->render('index');
    }
}

