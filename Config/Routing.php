<?php

return 
[
    'index' => 
        [
            'controller' => 'indexController',
            'method' => [
                'index' => 'indexAction'
            ] 
        ],
    'default' =>
        [
            'controller' => 'indexController',
            'method' => 'indexAction'
        ]
];