<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Check CORS
 */
$app->before(function (Request $request) {
    if ($request->getMethod() === "OPTIONS") {
        $response = new Response();
        $response->headers->set("Access-Control-Allow-Origin","*");
        $response->headers->set("Access-Control-Allow-Methods","GET,POST,PUT,DELETE,OPTIONS");
        $response->headers->set("Access-Control-Allow-Headers","Content-Type");
        $response->setStatusCode(200);

        return $response->send();
    }
}, Application::EARLY_EVENT);

/**
 * Check JWT
 */
$app->before(function (Request $request) {
    if ($request->headers->get('Authorization') == null && $request->getRequestUri() != '/login') {
        $response = new Response();
        $response->setStatusCode(403);

        return $response->send();
    }
});

/**
 * Allow CORS
 */
$app->after(function (Request $request, Response $response) {
    $response->headers->set("Access-Control-Allow-Origin","*");
    $response->headers->set("Access-Control-Allow-Methods","GET,POST,PUT,DELETE,OPTIONS");
});
