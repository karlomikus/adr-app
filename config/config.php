<?php

$app['debug'] = true;

$app['config.database'] = [
    'driver'   => getenv('DB_DRIVER'),
    'dbname'   => getenv('DB_NAME'),
    'user'     => getenv('DB_USER'),
    'password' => getenv('DB_PASS'),
    'host'     => getenv('DB_HOST'),
];

$app['key'] = getenv('API_KEY');
