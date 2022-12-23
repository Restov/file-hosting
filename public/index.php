<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
function myAutoloader($class)
{
    $path = __DIR__ . '/../app/controllers/' . $class . '.php';
    if (file_exists($path)) {
        require_once $path;
    }
}

spl_autoload_register('myAutoloader');

$app = AppFactory::create();
$container = $app->getContainer();
$container['db'] = function ($container) {
    $db = new PDO('mysql:host=localhost;dbname=slim;charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
};


$container['UserController'] = function ($container) {
    return new UserController();
};

$app->get('/users', 'UserController:list');

$app->run();
