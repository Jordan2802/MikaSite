<?php
namespace App;

use App\Database\MysqlDatabase;

class App{
    
    public $title = "L'Univers Intelligent";
    private static $_instance;
    private $db_instance;
    

    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public  function getTable($name){

        $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this->getDb());
    }

    public function getDb(){
        $config = COnfig::getInstance();
        if(is_null($this->db_instance)){
            return new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
        }
        return $this->db_instance;
    }
}