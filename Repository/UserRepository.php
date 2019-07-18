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
                $_SESSION['id'] = $user->getId();
                
                header('Location: index.php?r=index');
            } else {
                return [ 'error' => 'Mot de passe incorrect'];
            }
        } else {
            return [ 'error' => 'Cet email n \'est associé à aucun compte'];
        }
    }
    
    public function register($params)
    {
        if ($params['password'] != $params['password-confirm']) {
            return [ 'error' => 'Les mots de passes doivent etre identiques'];
        }

        if (strlen($params['password']) < 8) {
            return [ 'error' => 'le mot de passe doit contenir au moins 8 caractères'];
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
            
            return [ 'success' => 'Vous êtes bien enregistré'];
        } else {
            return [ 'error' => $params['email'].' est déja utilisé'];
        }

    }
}

