<?php

namespace App\Lib;

use Psr\Container\ContainerInterface;
use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;
use Twig\TwigFunction;

class ViewExtension extends AbstractExtension implements GlobalsInterface {
    protected $container;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    public function getGlobals() {
        return [
            'settings' => $this->container->get('settings'),
        ];
    }

    public function getFunctions() {
        return [
            new TwigFunction('i', [$this, 'i'], ['is_safe' => ['html']]),
            new TwigFunction('t', ['App\Lib\Locale', 't'], ['is_safe' => ['html']]),
        ];
    }

    public function i($name, $type = 's') {
        return "<i class='fa${type} fa-${name} fa-fw'></i>";
    }
}
