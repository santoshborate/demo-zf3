<?php

declare(strict_types=1);

use Doctrine\DBAL\Driver\PDOMySql\Driver as PDOMySqlDriver;

return [
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass' => PDOMySqlDriver::class,
                'params' => [
                    'host' => '127.0.0.1',
                    'port' => '3306',
                    'user' => 'testuser',
                    'password' => 'testuser',
                    'dbname' => 'zf_assignment',
                    'charset' => 'utf8',
                ],
            ],
        ],
    ],
];