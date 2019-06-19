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
            new TwigFunction('asset', [$this, 'asset']),
        ];
    }

    public function i($name, $type = 's') {
        return "<i class='fa${type} fa-${name} fa-fw'></i>";
    }

    public function asset($link) {
        $url = !empty($_ENV['ASSETS_HOST']) ? 'https://' . $_ENV['ASSETS_HOST'] . '/' : '/';
        $created_at = filemtime(__DIR__ . '/../../public/' . $link);

        return $url . $link . '?' . $created_at;
    }
}
