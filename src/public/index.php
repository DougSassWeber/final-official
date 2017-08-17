<?php
/**
 * Created by PhpStorm.
 * User: DouglasSass
 * Date: 8/16/17
 * Time: 10:59 PM
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require __DIR__ . '/vendor/codeception/codeception/autoload.php';
$app = new \App;
require __DIR__ . '/../settings.php';
require __DIR__ . '/../dependencies.php';
$app->get('/hello/{name}', function (Request $req, Response $resp) {
    $name = $req->getAttribute('name');
    $resp->getBody()->write('Hello, ' . $name);
    return $resp;
});
require __DIR__ . '/../routes.php';
$app->run();
