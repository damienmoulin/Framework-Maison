<?php

return 
[
    // DON'T REMOVE default route, EDIT if you want !
    'default' =>
        [
            'controller' => 'defaultController',
            'method' => [
                'GET' => 'indexAction',
                'POST' => 'addAction',
                'PUT' => 'editAction',
                'DELETE' => 'deleteAction'
            ],
            'authentification' => null
        ],
    'login' =>
        [
            'controller' => 'userController',
            'method' => [
                'GET' => 'showLoginAction',
                'POST' => 'loginAction'
            ],
            'authentification' => null
        ],
    'register' =>
        [
            'controller' => 'userController',
            'method' => [
                'GET' => 'showRegisterAction',
                'POST' => 'registerAction'
            ],
            'authentification' => null
        ],
    'logout' =>
        [
            'controller' => 'userController',
            'method' => [
                'DELETE' => 'logoutAction'
            ],
            'authentification' => ['ROLE_ADMIN','ROLE_USER']
        ]
];