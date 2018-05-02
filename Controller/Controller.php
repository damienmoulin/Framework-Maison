<?php
namespace Controller;

class Controller 
{
    private $twig;
    
    public function __construct()
    {
        $this->twig = new \Twig_Environment(new \Twig_Loader_Filesystem('Template'), array(
            'cache' => false
        ));
    }
    
    public function indexAction()
    {        
        return $this->render('index');
    }
    
    public function render($route, $attributes = [])
    {
        $template = $this->twig->loadTemplate($route.'.twig');
        echo $template->render($attributes);
    }
}