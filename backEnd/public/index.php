<?php


require __DIR__ . '/../vendor/autoload.php';


//Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);

//Set up dependencies
require __DIR__ . '/../src/dependencies.php';

//register routes
require __DIR__ . '/../src/routes.php';

//run app
$app->run();
