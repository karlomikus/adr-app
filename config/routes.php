<?php

/**
 * Responders
 */
$app['responder.list-categories'] = function() use ($app) {
    return new App\Category\Responder\ListCategoriesResponder();
};
$app['responder.show-category'] = function() use ($app) {
    return new App\Category\Responder\ShowCategoryResponder();
};
$app['responder.login'] = function() use ($app) {
    return new App\User\Responder\LoginResponder();
};

/**
 * Actions
 */
$app['action.list-categories'] = function() use ($app) {
    return new App\Category\Action\ListCategoriesAction($app['responder.list-categories'], $app['repository.categories']);
};
$app['action.show-category'] = function() use ($app) {
    return new App\Category\Action\ShowCategoryAction($app['responder.show-category'], $app['repository.categories']);
};
$app['action.login'] = function() use ($app) {
    return new App\User\Action\LoginAction($app['responder.login'], $app['repository.users']);
};

/**
 * Routes
 */
$app->get('/', function () {
    $msg = [];
    $msg[] = '<h1>Application API</h1>';
    $msg[] = '<p>You\'re probably looking for JSON API:</p>';
    $msg[] = '<ul>';
    $msg[] = '<li><a href="/api/v1/categories">List all categories</a></li>';
    $msg[] = '<li><a href="/api/v1/categories/1">Show a specific category</a></li>';
    $msg[] = '</ul>';

    return implode('', $msg);
});

/** API */
$app->get('/api/v1/categories', 'action.list-categories');
$app->get('/api/v1/categories/{id}', 'action.show-category');

$app->post('/api/v1/login', 'action.login');
