<?php

use Dotenv\Dotenv;
use Phpmig\Adapter;
use Pimple\Container;

$container = new Container();

$container['db'] = function () {
    $dotenv = Dotenv::create(__DIR__);
    $dotenv->load();

    $mysql = "mysql:dbname={$_ENV['DB_NAME']};host={$_ENV['DB_HOST']};port={$_ENV['DB_PORT']}";
    $dbh = new PDO($mysql, $_ENV['DB_USER'], $_ENV['DB_PASS']);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
};

$container['phpmig.adapter'] = function ($c) {
    return new Adapter\PDO\Sql($c['db'], 'migrations');
};

$container['phpmig.migrations_path'] = __DIR__ . DIRECTORY_SEPARATOR . 'migrations';

return $container;
