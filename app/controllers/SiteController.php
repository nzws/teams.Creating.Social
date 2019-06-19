<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class SiteController extends AppController {
    public function about(Request $request, Response $response, array $args) {
        $this->container->get('logger')->info('Slim-Skeleton \'/\' route');

        return $this->container->get('renderer')->render($response, 'about.twig.html');
    }
}
