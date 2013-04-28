<?php

$db = array(
    // development database (default)
    'dev' => array(
        'driver' => 'mysql',
        'hostname' => 'localhost',
        'username' => 'root',
        'password' => 'root',
        'database' => 'benchmark'
    ),
    //production database (live website)
    'prod' => array(
        'driver' => '',
        'hostname' => '',
        'username' => '',
        'password' => '',
        'database' => ''
    )
);

// -- end