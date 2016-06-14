<?php

$app['responder.list-categories'] = function() use ($app) {
    return new App\Category\Responder\ListCategoriesResponder();
};

$app['action.list-categories'] = function() use ($app) {
    return new App\Category\Action\ListCategoriesAction($app['responder.list-categories'], $app['repository.categories']);
};

$app->get('/', function () {
    $msg = [];
    $msg[] = '<h1>Application API</h1>';
    $msg[] = '<p>You\'re probably looking for JSON API:</p>';
    $msg[] = '<ul>';
    $msg[] = '<li><a href="/api/v1/categories">List all categories</a></li>';
    $msg[] = '</ul>';

    return implode('', $msg);
});

/** API */
$app->get('/api/v1/categories', 'action.list-categories');
