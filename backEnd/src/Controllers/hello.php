<?php


use Slim\Http\Request; //namespace
use Slim\Http\Response; //namespace

//read table hr
$app->get('/hello/{name}', function (Request $request, Response $response, array $arg){
    $name = $arg['name'];
    $response->getBody() -> write ("Hello world, $name");
    return $response;

});
