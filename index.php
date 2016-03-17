<?php
ini_set('display_errors', 1);
include './vendor/autoload.php';
include './core.class.php';


$app = new \Slim\Slim();
$app->config('debug', true);

$app->get('/','Core:getMainInfo');
$app->get('/getCitys(/:id)','Core:getCitys');

$app->run();