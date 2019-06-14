<?php

use Slim\App;
use Slim\Csrf\Guard;

return function (App $app) {
    $app->add(new Guard);
};
