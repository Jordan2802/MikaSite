<?php


use Core\HTML\BootstrapForm;

$postTable = App::getInstance()->getTable('POST');

if(!empty($_POST)){
    $result = $postTable->delete($_POST['id']);
    header('Location: admin.php');
}

