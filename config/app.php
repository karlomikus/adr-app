<?php

/** Register Doctrine DBAL */
$app->register(new Silex\Provider\DoctrineServiceProvider(), [
    'db.options' => $app['config.database'],
]);

/** Register actions */
$app->register(new Silex\Provider\ServiceControllerServiceProvider());

/** Register repositories */
$app->register(new App\Providers\RepositoryServiceProvider());
