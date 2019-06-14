<?php

namespace App\Controllers;

use App\Lib\Locale;
use Slim\Http\Request;
use Slim\Http\Response;
use Psr\Container\ContainerInterface;

class SiteController {
    protected $container;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    public function about(Request $request, Response $response, array $args) {
        $this->container->get('logger')->info('Slim-Skeleton \'/\' route');

        return $this->container->get('renderer')->render($response, 'index.phtml', ['name' => Locale::test()]);
    }
}
