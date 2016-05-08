<?php
require("includes/constants.php");

return [
    'propel' => [
        'database' => [
            'connections' => [
                DATABASE => [
                    'adapter'    => 'mysql',
                    'classname'  => 'Propel\Runtime\Connection\ConnectionWrapper',
                    'dsn'        => 'mysql:host='.SERVER.';dbname='.DATABASE,
                    'user'       => USERNAME,
                    'password'   => PASSWORD,
                    'attributes' => []
                ]
            ]
        ],
        'runtime' => [
            'defaultConnection' => DATABASE,
            'connections' => [DATABASE]
        ],
        'generator' => [
            'defaultConnection' => DATABASE,
            'connections' => [DATABASE]
        ]
    ]
];