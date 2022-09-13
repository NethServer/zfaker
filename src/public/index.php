<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
// Parse json, form data and xml
$app->addBodyParsingMiddleware();

$app->post('/z-push-admin', function (Request $request, Response $response, $args) {
    $data = $request->getParsedBody();
    $cmd =  __DIR__ ."/wrapper.sh -- {$data['params']}";
    $out = shell_exec($cmd);
    $response->getBody()->write($out ? $out : "");
    return $response;
});

$app->run();
