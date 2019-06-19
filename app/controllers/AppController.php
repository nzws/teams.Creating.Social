<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class AppController {
    protected $container;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    public function error(Request $request, Response $response, $errorStatus = 500, $errorReason = null) {
        $this->container->get('logger')->warn('Error' . $errorStatus);

        $response = $response->withStatus($errorStatus);

        return $this->container->get('renderer')->render(
            $response,
            'error.twig.html',
            ['errorStatus' => $errorStatus, 'errorReason' => $errorReason]
        );
    }
}
