<?php

class Categories extends Main
{
    public $id;
    public $category;
    protected $table = 'categories';
    protected $pivot_table = 'pivot_cat';


    public function checkForCategories(){

        $query = "SELECT * FROM ". $this->table . ";";
        return $this->selectAll($query);

    }


    public function addCategory($params){
        if(array_key_exists('parent_id', $params)){
            $query = "INSERT INTO categories (name, parent_id) VALUES (:name, :parent_id)";
        } else {
            $query = "INSERT INTO categories (name) VALUES (:name)";
        }
        echo $query;

        return $this->insert($query,$params);

    }

    public function displayCategories(){

        $query = "SELECT * FROM ". $this->table;

        return $rez = $this->selectAll($query);

    }

    public function updateCategory($params){
        $query = "UPDATE ". $this->table . " SET name=:name WHERE id=:id";
        return $this->update($query,$params);
    }

}