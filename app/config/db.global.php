<?php
/**
 * DB config
 */
return [
    'db' => [
        'fetch' => PDO::FETCH_CLASS,
        'mysql' => [
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'framework',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ],
    ],
];