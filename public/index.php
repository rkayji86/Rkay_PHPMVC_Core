<?php

use app\controllers\AuthController;
use app\controllers\SiteController;
use app\core\Application;
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

$app = new Application(dirname(__DIR__));

$app->router->get('/', [SiteController::class,'home']);

$app->router->get('/contact',[SiteController::class,'contact']);

$app->router->post('/contact',[SiteController::class,'handleData']);


$app->router->get('/login',[AuthController::class,'login']);
$app->router->post('/login',[AuthController::class,'login']);
$app->router->get('/register',[AuthController::class,'register']);
$app->router->post('/register',[AuthController::class,'register']);

$app->run();