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

        return $this->insert($query,$params);
    }

    public function displayAllPosts(){
        // display all posts with trashed posts too

        $query = "SELECT * FROM ". $this->table;

        return  $this->selectAll($query);
    }

    public function updatePost($params,$id){
        // update a post

        // filter the array for null values or false or empty
        $f_params = array_filter($params,"strlen");

        // create part of the SQL query ex: name=:name, title=:title
        $keys_values = [];
        foreach ($f_params as $key => $param){
            $keys_values[] = $key. " = :".$key;
        }
        $keys = implode(",", $keys_values);


        $query = "UPDATE ". $this->table . " SET ". $keys ." WHERE id=".$id;
        echo $query;
        $result =  $this->update($query,$f_params);
        return $result;
    }


    public function getPostCategories($id){
        $arr['id'] = $id;

        $query = "SELECT categories FROM ".$this->table." WHERE id=:id";

        $categories = $this->select($query,$arr);

        return $cat_array = explode(',', $categories[0]["categories"]);
    }

    public function displayActivePosts(){
        // display all posts with trashed posts too

        $query = "SELECT * FROM ". $this->table ." WHERE deleted_at IS NULL";

        return  $this->selectAll($query);
    }

    public function displayTrashedPosts(){
        // display all posts with trashed posts too

        $query = "SELECT * FROM ". $this->table ." WHERE deleted_at IS NOT NULL";

        return  $this->selectAll($query);
    }

    public function getPostData($id){
        $query = "SELECT * FROM ". $this->table ." WHERE id=".$id;

        $rez = $this->selectAll($query);

        // thre query return an array with a data array inside, below we transform it into a simple array not a multy dimensions array

        $rezults = [];
        foreach ($rez as $item){
            foreach ($item as $key => $value){
                $rezults[$key] = $value;
            }
        }
        return $rezults;

    }

    public function trashPost($params){

        $query = "UPDATE ". $this->table . " SET deleted_at =:deleted_at WHERE id=:id";
        echo $query;
        return $this->remove($query,$params);
    }

    public function deletePost($id){
        $arr['id'] = $id;

        $query = "DELETE FROM ". $this->table. " WHERE id=:id";

        return $this->delete($query,$arr);
    }









}