<?php
namespace Controller;

use Repository\UserRepository;
use Entity\User;

class userController extends Controller
{
    public function __construct($db)
    {
        parent::__construct();
        $this->userRepository = new UserRepository($db);
    }
    
    public function loginAction()
    {
        if (!empty($_POST)) {
            $this->userRepository->connect($_POST);
        }
        return $this->render('user/login');
    }
    
    public function registerAction()
    {
        if (!empty($_POST)) {
            $user = $this->userRepository->register($_POST);
        }
        return $this->render('user/register');
    }
}

