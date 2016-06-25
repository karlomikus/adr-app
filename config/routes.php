<?php

/**
 * Responders
 */
$app['responder.list-projects'] = function() use ($app) {
    return new App\Project\Responder\ListProjectsResponder();
};
$app['responder.show-project'] = function() use ($app) {
    return new App\Project\Responder\ShowProjectResponder();
};
$app['responder.login'] = function() use ($app) {
    return new App\User\Responder\LoginResponder();
};

/**
 * Actions
 */
$app['action.list-projects'] = function() use ($app) {
    return new App\Project\Action\ListProjectsAction($app['responder.list-projects'], $app['repository.projects']);
};
$app['action.show-project'] = function() use ($app) {
    return new App\Project\Action\ShowProjectAction($app['responder.show-project'], $app['repository.projects']);
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
    $msg[] = '<li><a href="/api/v1/projects">List all projects</a></li>';
    $msg[] = '<li><a href="/api/v1/projects/1">Show a specific category</a></li>';
    $msg[] = '</ul>';

    return implode('', $msg);
});

/** API */
$app->get('/api/v1/projects', 'action.list-projects');
$app->get('/api/v1/projects/{id}', 'action.show-project');

$app->post('/login', 'action.login');
