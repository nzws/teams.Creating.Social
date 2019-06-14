<?php

use App\Controllers\SiteController;
use Slim\App;

return function (App $app) {
    $app->redirect('/', '/about');
    $app->get('/about', SiteController::class . ':about');
};
