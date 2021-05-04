<?php


class Comments extends Main{

    private $table= 'comments';

    public $id;
    public $post_id;
    public $comment_id;
    public $comment;
    public $author;
    public $date_posted;
    private $active;



    public function addComment($params){


        $query = "INSERT INTO ".$this->table." (". $this->matchKeys($params).") VALUES (". $this->matchValues($params).")";

        if($this->insert($query,$params)){
            $statusCode['statusCode'] = 200;
             echo json_encode($statusCode);
        } else {
            echo json_encode(array("statusCode"=>201));        }
    }

    public function getAllComments(){
        $query = "SELECT * FROM ". $this->table." ORDER BY id DESC";

        return $this->selectAll($query);

    }

}