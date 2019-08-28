<?php
namespace App\Controller\Admin;

use App;
use Core\Auth\DBAuth;



class AppController extends \App\Controller\AppController{

    public function __construc(){
        parent::__construc();
        $app = App::getInstance();
        $auth = new DBAuth($app->getDB());
        if(!$auth->logged()){
            $this->forbidden();
        }
    }
   
}