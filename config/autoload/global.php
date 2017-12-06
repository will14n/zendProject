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


$db = parse_url(getenv('CLEARDB_DATABASE_URL'));

return [
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass' => PDOMySqlDriver::class,
                'params' => [
                    'host'     => $db['host'],                    
                    'user'     => $db['user'],
                    'password' => $db['pass'],
                    'dbname'   => substr($db["path"], 1),
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
