<?php

$app['responder.list-categories'] = function() use ($app) {
    return new App\Category\Responder\ListCategoriesResponder();
};

$app['action.list-categories'] = function() use ($app) {
    return new App\Category\Action\ListCategoriesAction($app['responder.list-categories'], $app['repository.categories']);
};

$app->get('/', 'action.list-categories');
