<?php
namespace Controller;

use Template;

class indexController
{
    public function __construct()
    {
        
    }
    
    public function indexAction()
    {        
        return $this->render('index');
    }
    
    public function render($route, $attributes = null)
    {
        $page = file_get_contents('Template/'.$route.'.php');
        echo $page;
    }
}