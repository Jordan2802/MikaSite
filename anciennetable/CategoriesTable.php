<?php

namespace App\Table;

use App\App;

class CategoriesTable extends Table{

    protected static $table = 'categories';

    
    public function getUrl(){
        return 'index.php?p=categorie&id=' . $this->id;
    }
}