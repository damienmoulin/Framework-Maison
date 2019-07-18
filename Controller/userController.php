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

    public function showLoginAction()
    {
        return $this->render('user/login');
    }

    public function loginAction()
    {

        if (!empty($_POST)) {
            try {
                $reponse = $this->userRepository->connect($_POST);

                if (isset($reponse["error"])) {
                    return $this->render('user/login', $reponse);
                }
                header('Location:index.php?r=default');
            } catch (\Exception $e) {
                throw new \Exception($e);
            }
        }
    }

    public function showRegisterAction()
    {
        return $this->render('user/register');
    }

    public function registerAction()
    {
        if (!empty($_POST)) {
            try {
                $reponse = $this->userRepository->register($_POST);

                if (isset($reponse["error"])) {
                    return $this->render('user/register', $reponse);
                }
                header('Location:index.php?r=login');
            } catch (\Exception $e) {
                throw new \Exception($e);
            }
        }
    }
    
    public function logoutAction()
    {
        session_destroy();
        header('Location: index.php?r=default');
    }
}

