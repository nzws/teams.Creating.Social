<?php
use Phpmig\Adapter;
use Pimple\Container;

$container = new Container();

$container['db'] = function () {
    // todo: require_once __DIR__ . '/config.php';
    $mysql = "mysql:dbname={$env['database']['db']};host={$env['database']['host']};port={$env['database']['port']}";
    $dbh = new PDO($mysql, $env['database']['user'], $env['database']['pass']);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
};

$container['phpmig.adapter'] = function ($c) {
    return new Adapter\PDO\Sql($c['db'], 'migrations');
};

$container['phpmig.migrations_path'] = __DIR__ . DIRECTORY_SEPARATOR . 'migrations';

return $container;
