<?php

return [
    'propel' => [
        'database' => [
            'connections' => [
                'tdew' => [
                    'adapter'    => 'mysql',
                    'classname'  => 'Propel\Runtime\Connection\ConnectionWrapper',
                    'dsn'        => 'mysql:host=localhost;dbname=tdew',
                    'user'       => 'tdew',
                    'password'   => 'wolletje',
                    'attributes' => []
                ]
            ]
        ],
        'runtime' => [
            'defaultConnection' => 'tdew',
            'connections' => ['tdew']
        ],
        'generator' => [
            'defaultConnection' => 'tdew',
            'connections' => ['tdew']
        ]
    ]
];
