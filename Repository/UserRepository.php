<?php
namespace Repository;

use Entity\User;

class UserRepository extends Repository
{

    public function __construct($db)
    {
        parent::__construct($db);
    }
    
    public function connect($params)
    {
        $user = $this->findBy('email', $params['email']);
        
        if (!empty($user)) {
            if (password_verify($params['password'],$user->getPassword())) {
                $_SESSION['username'] = $user->getUsername();
                $_SESSION['email'] = $user->getEmail();
                $_SESSION['role'] = $user->getRole();
                
                header('Location: index.php?r=index');
            } else {
                echo 'Mot de passe incorrect';
                return;
            }
        } else {
            echo 'Cet email n \'est associé à aucun compte';
            return;
        }
    }
    
    public function register($params)
    {
        if ($params['password'] != $params['password-confirm']) {
            echo "les mots de passes doivent etre identiques";
            return;
        }
        
        if (empty($this->findBy('email', $params['email']))) {
            $user = new User();
            $user
            ->setUsername($params['username'])
            ->setEmail($params['email'])
            ->setPassword(password_hash($params['password'], PASSWORD_DEFAULT))
            ->setRole('ROLE_USER')
            ->setCreated_at((new \DateTime())->format('Y/m/d H:i:s'));
            
            $this->insert($user);
            
            echo "vous êtes bien enregistré";
            return;
        } else {
            echo $params['email']." est déja utilisé";
            return;
        }

    }
}

