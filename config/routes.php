<?php

$app['responder.list-categories'] = function() use ($app) {
    return new App\Category\Responder\ListCategoriesResponder();
};

$app['responder.show-category'] = function() use ($app) {
    return new App\Category\Responder\ShowCategoryResponder();
};

$app['action.list-categories'] = function() use ($app) {
    return new App\Category\Action\ListCategoriesAction($app['responder.list-categories'], $app['repository.categories']);
};

$app['action.show-category'] = function() use ($app) {
    return new App\Category\Action\ShowCategoryAction($app['responder.show-category'], $app['repository.categories']);
};

$app->before(function (Symfony\Component\HttpFoundation\Request $request) {
   if ($request->getMethod() === "OPTIONS") {
       $response = new Response();
       $response->headers->set("Access-Control-Allow-Origin","*");
       $response->headers->set("Access-Control-Allow-Methods","GET,POST,PUT,DELETE,OPTIONS");
       $response->headers->set("Access-Control-Allow-Headers","Content-Type");
       $response->setStatusCode(200);
       return $response->send();
   }
}, Silex\Application::EARLY_EVENT);

$app->after(function (Symfony\Component\HttpFoundation\Request $request, Symfony\Component\HttpFoundation\Response $response) {
   $response->headers->set("Access-Control-Allow-Origin","*");
   $response->headers->set("Access-Control-Allow-Methods","GET,POST,PUT,DELETE,OPTIONS");
});

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
