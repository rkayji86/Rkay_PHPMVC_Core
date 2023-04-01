<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL & ~E_NOTICE);
use App\core\Application;
$loader = require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";
$loader->addPsr4('APP\\', __DIR__.'/../src/');

$app = new Application(dirname(__DIR__));

$app->router->get('/', 'home');


$app->run();