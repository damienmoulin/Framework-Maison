<?php
session_start();

$loader = require_once( 'vendor/autoload.php' );

$loader->add('Controller\\', __DIR__);
$loader->add('Repository\\', __DIR__);
$loader->add('Service\\', __DIR__);
$loader->add('Entity\\', __DIR__);
$loader->add('Repository\\', __DIR__);
$loader->add('Template\\', __DIR__);

class index
{
    private $routes;
    private $database;
    private $pdo;
    
    public function __construct()
    {    
        $this->routes = require_once 'Config/Routing.php';
        $this->databases = require_once 'Config/Databases.php';
        try {
            //Connexions a la base de donnée
            $this->database = new Service\DatabaseConnexion('duel', $this->databases);
        } catch (\PDOException $exception) {
            die($exception->getMessage());
        }
        
        if (isset($_REQUEST['r']) && isset($this->routes[$_REQUEST['r']])) {
            $controllerName = $this->routes[$_REQUEST['r']]['controller'];
            if (isset($_REQUEST['action']) && isset($this->routes[$_REQUEST['r']]['method'][$_REQUEST['action']])) {
                $action = $this->routes[$_REQUEST['r']]['method'][$_REQUEST['action']];
               
            } else {
                $action = 'indexAction';
            }
            
            //Verification des droits d'accés
            if (isset($this->routes[$_REQUEST['r']]['authentification']) && (!isset($_SESSION['role']) || !in_array($_SESSION['role'], $this->routes[$_REQUEST['r']]['authentification']))) {
                $controllerName = $this->routes['login']['controller'];
                $action = $this->routes['login']['method']['login'];
            }
            
        } else {
            //Attention aux droits d'accés
            $controllerName = $this->routes['default']['controller'];
            $action = $this->routes['default']['method'];
        }
        
        $class = "\Controller\\".$controllerName;
        
        $controller = new $class($this->database);
        return $controller->$action();
    }
}

new index();
