<?php
namespace App;

use App\Database;

class App{
    const DB_NAME = 'mika';
    const DB_USER = 'root';
    const DB_PASS = '';
    const DB_HOST = 'localhost';

    private static $database;
    private static $title = "Univers intelligent";

    

    /**
     * Get the value of database
     */ 
    public static function getDb()
    {
        if( self::$database === null){

            self::$database = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);
        }
        return self::$database;
    }

    public static function notFound(){
        
    header("HTTP/1.0 404 Not Found");
    header('location:index.php?p=404 ');
    }

    public static function getTitle(){
        return self::$title;
    }

    public static function setTitle($title){
        self::$title = $title . ' | ' . self::$title;

    }
}