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
        return $this->render('index');
    }
}

