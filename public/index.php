<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL & ~E_NOTICE);
use app\core\Application;
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

$app = new Application(dirname(__DIR__));

$app->router->get('/', 'home');


$app->run();