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

    // Remove a row/s from displaying it in a Database Table
    public function remove( $statement = "" , $parameters = [] ){
        try{
            global $database;
            $this->executeStatement( $statement , $parameters );

        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    // Deletes a row/s in a Database Table
    public function delete( $statement = "" , $parameters = [] ){
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

    // functions matchKeys() and matchValues() work together, they match the number of keys with the number of the values in the mysql query
    // so you wont get an error if some fields are missing
    protected function matchKeys($array){
        $keys_params = [];

        foreach ($array as $key => $value){
            $keys_params[] = $key;
        }
        return implode(",", $keys_params);

    }
    protected function matchValues($array){

        $values = [];
        foreach ($array as $key => $value){
            $new = ":".$key;
            $values[] = $new;
        }
        return implode(",", $values);
    }

}