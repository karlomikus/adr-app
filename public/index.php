<?php
require_once __DIR__.'/../vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

$app = new Silex\Application();

require __DIR__ . '/../src/config.php';
require __DIR__ . '/../src/app.php';
require __DIR__ . '/../src/routes.php';

$app->run();
