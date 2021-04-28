<?php

class Main{

    public $errors = [];

    public static function clean($string){
        return htmlentities($string);
    }


    // Insert a row/s in a Database Table
    public function insert( $statement = "" , $parameters = [] ){
        try{
            global $database;
            $this->executeStatement( $statement , $parameters );
            return $database->connection->lastInsertId();

        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    // Select a row/s in a Database Table
    public function select( $statement = "" , $parameters = [] ){
        try{
            global $database;
            $stmt = $this->executeStatement( $statement , $parameters );
            return $stmt->fetchAll();

        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }
    // Select a row/s in a Database Table
    public function selectAll( string $statement = ""){
        try{
            global $database;
            $stmt = $database->connection->prepare($statement);
            $stmt->execute();
            return $stmt->fetchAll();

        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }
    // Update a row/s in a Database Table
    public function update( $statement = "" , $parameters = [] ){
        try{
            global $database;
            $this->executeStatement( $statement , $parameters );

        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    // Remove a row/s in a Database Table
    public function remove( $statement = "" , $parameters = [] ){
        try{
            global $database;
            $this->executeStatement( $statement , $parameters );

        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    // execute statement
    private function executeStatement( $statement = "" , $parameters = [] ){
        try{
            global $database;
            $stmt = $database->connection->prepare($statement);
            $stmt->execute($parameters);
            return $stmt;

        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }


}