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
        
        $error = [];
        
        if (!empty($_POST)) {
            $error = $this->userRepository->connect($_POST);
        }
        return $this->render('user/login', $error);
    }
    
    public function registerAction()
    {
        if (!empty($_POST)) {
            $this->userRepository->register($_POST);
        }
        return $this->render('user/register');
    }
    
    public function logoutAction()
    {
        session_destroy();
        header('Location: index.php?r=index');
    }
}

