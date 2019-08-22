<?php
session_start();
use App\App;
use App\Config;
use App\Autoloader;


require '../app/Autoloader.php';
Autoloader::register();


$app = App::getInstance();


$posts = $app->getTable('Posts');

var_dump($posts->all());

