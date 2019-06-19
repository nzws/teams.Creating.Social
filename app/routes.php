<?php

use App\Controllers\AppController;
use App\Controllers\AuthController;
use App\Controllers\SiteController;
use Slim\App;

return function (App $app) {
    $app->redirect('/', '/about');
    $app->get('/about', SiteController::class . ':about');

    $app->group('/auth', function (App $app) {
        $app->get('/login', AuthController::class . ':login');
    });

    $container = $app->getContainer();

    $container['notFoundHandler'] = function ($c) {
        $controller = new AppController($c);

        return function ($request, $response) use ($controller) {
            return $controller->error($request, $response, 404);
        };
    };

    $container['errorHandler'] = function ($c) {
        $controller = new AppController($c);

        return function ($request, $response) use ($controller) {
            return $controller->error($request, $response, 500);
        };
    };

    $container['phpErrorHandler'] = function ($c) {
        $controller = new AppController($c);

        return function ($request, $response) use ($controller) {
            return $controller->error($request, $response, 500);
        };
    };
};
