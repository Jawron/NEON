<?php


class Posts extends Main{

    private $table = 'posts';

    public $id;
    public $title;
    public $content;
    public $tags;
    public $categories;
    public $author;
    public $created_at;
    public $deleted_at;
    public $featured_image;


    public function createPost($params){
        // create posts
            $query = "INSERT INTO ". $this->table ." (". $this->matchKeys($params).") VALUES 
            (". $this->matchValues($params) .")";

            var_dump($this->matchValues($params));
            echo $query;
        return $this->insert($query,$params);
    }

    public function displayAllPosts(){
        // display all posts

        $query = "SELECT * FROM ". $this->table;

        return $rez = $this->selectAll($query);
    }

    public function updatePost(){
        // update a post


        $query = "UPDATE ". $this->table . " SET name=". $this->ma." WHERE id=:id";
        return $this->update($query,$params);
    }

    public function removePost(){
        // remove post, only hide it with the combo created at & deleted at


    }

    public function deletePost(){
        // delete permanently a post

    }












}