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
$app->get('/api/v1/projects', 'action.list-projects');
$app->get('/api/v1/projects/{id}', 'action.show-project');

$app->post('/login', 'action.login');
