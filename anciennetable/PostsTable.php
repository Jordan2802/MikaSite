<?php

namespace App\Table;

use App\App;

class PostsTable extends Table{

    protected static $table = 'posts';

    public static function getLast(){
        return self::query(
        "   SELECT posts.id, posts.titre, posts.contenu, categories.titre as categorie 
            FROM posts 
            LEFT JOIN categories ON category_id = categories.id
            ORDER BY posts.date DESC
        ");
    }

    public function getUrl(){
        return 'index.php?p=article&id=' . $this->id;
    }

    public function getExtrait(){
        $html = '<p>' . substr($this->contenu, 0, 100) . '...</p>';
        $html .= '<p><a href="'. $this->getUrl() .'">Voir la suite </a></p>';
        return $html;
    }


    public static function lastByCategory($category_id){
        return self::query(
            "   SELECT posts.id, posts.titre, posts.contenu, categories.titre as categorie 
                FROM posts 
                LEFT JOIN categories 
                    ON category_id = categories.id
                WHERE category_id = ?
                ORDER BY posts.date DESC
            ", [$category_id]);
    }

    public static function find($id){
        return self::query(
            "   SELECT posts.id, posts.titre, posts.contenu, categories.titre as categorie 
            FROM posts 
            LEFT JOIN categories ON category_id = categories.id
            WHERE posts.id = ? 
            ",[$id], true);
    }
   
    
}