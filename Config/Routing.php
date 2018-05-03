<?php

return 
[
    'index' => 
        [
            'controller' => 'indexController',
            'method' => [
                'index' => 'indexAction'
            ],
            'authentification' => ['ROLE_ADMIN','ROLE_USER']
        ],
    'default' =>
        [
            'controller' => 'indexController',
            'method' => 'indexAction',
            'authentification' => ['ROLE_ADMIN','ROLE_USER']
        ],
    'connexion' =>
        [
            'controller' => 'connexionController',
            'method' => 'indexAction'  
        ]
];