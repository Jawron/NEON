<?php

class Main{

    public $errors = [];

    public static function clean($string){
        return htmlentities($string);
    }


    // Insert a row/s in a Database Table
    public function Insert( $statement = "" , $parameters = [] ){
        try{
            global $database;
            $this->executeStatement( $statement , $parameters );
            return $database->connection->lastInsertId();

        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    // Select a row/s in a Database Table
    public function Select( $statement = "" , $parameters = [] ){
        try{

            $stmt = $this->executeStatement( $statement , $parameters );
            return $stmt->fetchAll();

        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    // Update a row/s in a Database Table
    public function Update( $statement = "" , $parameters = [] ){
        try{

            $this->executeStatement( $statement , $parameters );

        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    // Remove a row/s in a Database Table
    public function Remove( $statement = "" , $parameters = [] ){
        try{

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