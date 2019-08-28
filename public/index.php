<?php

use App\Controller\PostsController;
use App\Controller\UsersController;
define('ROOT', dirname(__DIR__));
require ROOT .'/app/App.php';
App::load();


$app = App::getInstance();


$posts = $app->getTable('Post');


if(isset($_GET['p'])){
    $page = $_GET['p'];
} else{
    $page = 'posts.index';
}


$page = explode('.', $page);

if($page[0] == 'admin'){
    $controller = '\App\Controller\Admin\\' . ucfirst($page[1]) . 'Controller';
    $action = $page[2];
} else{
    $controller = '\App\Controller\\' . ucfirst($page[0]) . 'Controller';
    $action = $page[1];
}

$controller = new $controller();
$controller->$action();
