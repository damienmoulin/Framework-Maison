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
            'controller' => 'userController',
            'method' => 'loginAction',
            'authentification' => ['ROLE_ADMIN','ROLE_USER']
        ],
    'login' =>
        [
            'controller' => 'userController',
            'method' => [
                'login' => 'loginAction',
                'register' => 'registerAction',
                'logout' => 'logoutAction'
            ],
            'authentification' => null
        ]
];