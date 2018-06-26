<?php
namespace Controller;

class Controller 
{
    private $twig;
    
    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem('./Template/');
        $this->twig = new \Twig_Environment($loader, array(
            'cache' => false
        ));
    }
        
    public function render($route, $attributes = [])
    {
        $template = $this->twig->loadTemplate($route.'.twig');
        echo $template->render($attributes);
    }
}