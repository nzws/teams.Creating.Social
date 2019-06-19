<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class AuthController extends AppController {
    public function login(Request $request, Response $response, array $args) {
        return $this->container->get('renderer')->render($response, 'auth/login.twig.html');
    }
}
