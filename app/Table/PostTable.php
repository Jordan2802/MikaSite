<?php

namespace App\Table;

use Core\Table\Table;

class PostTable extends Table{


    /**
     * Récupère les derniers artciles
     * @return array
     */
    public function last(){
        return $this->query(
            "   SELECT posts.id, posts.titre, posts.contenu, categories.titre as categorie 
                FROM posts 
                LEFT JOIN categories 
                    ON category_id = categories.id
                ORDER BY posts.date DESC
            ");
    }

     /**
     * Récupère les derniers artciles de la catégoie demandée
     * @param $category_id int
     * @return array
     */
    public function lastByCategory($category_id){
        return $this->query(
            "   SELECT posts.id, posts.titre, posts.contenu, categories.titre as categorie 
                FROM posts 
                LEFT JOIN categories ON category_id = categories.id
                WHERE posts.category_id = ?
                ORDER BY posts.date DESC", [$category_id]);
    }

    /**
     * Récupère un article en liant la catégorie associée
     * @param $id int
     * @return \App\Entity\PostEntity
     */
    public function find($id){
        return $this->query(
            "   SELECT posts.id, posts.titre, posts.contenu, categories.titre as categorie 
                FROM posts 
                LEFT JOIN categories ON category_id = categories.id
                WHERE posts.id = ?", [$id], true
            );
    }
   
    
}