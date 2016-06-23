<?php
require_once __DIR__.'/../vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

$app = new Silex\Application();

require __DIR__ . '/../config/config.php';
require __DIR__ . '/../config/app.php';
require __DIR__ . '/../config/middleware.php';
require __DIR__ . '/../config/routes.php';

$app->run();
