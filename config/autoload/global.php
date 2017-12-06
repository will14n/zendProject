<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */
use Doctrine\DBAL\Driver\PDOMySql\Driver as PDOMySqlDriver;

return [
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass' => PDOMySqlDriver::class,
                'params' => [
                    'host'     => 'k3xio06abqa902qt.cbetxkdyhwsb.us-east-1.rds.amazonaws.com',                    
                    'user'     => 'of5931pdu388d6ff',
                    'password' => 'p3k6qkibo0cqsn0o',
                    'dbname'   => 'xkzeet9m5yj5cs47',
                ]
            ],            
        ],
        'migrations_configuration' => [
            'orm_default' => [
                'directory' => 'data/Migrations',
                'name'      => 'Doctrine Database Migrations',
                'namespace' => 'Migrations',
                'table'     => 'migrations',
            ],
        ],     
    ],
];
