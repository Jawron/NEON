<?php

class Main{

    public $errors = [];

    public static function redirect($location){
        header("Location: $location");
    }


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
            $result = $this->executeStatement( $statement , $parameters );
            return $result->rowCount();
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

    public static function displayValidationErrors($err){
        if(is_array($err)){
            foreach ($err as $item){
                echo "<p class='alert-danger'>$item</p>";
            }
        } else {
            echo "<p class='alert-danger'>$err</p>";
        }

    }
    public static function displayValidationSuccess($err){
        if(is_array($err)){
            foreach ($err as $item){
                echo "<p class='alert-success'>$item</p>";
            }
        } else {
            echo "<p class='alert-success'>$err</p>";
        }

    }


    public function uploadImage(){
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                $this->errors[] = "File is an image - " . $check["mime"] . ".<br>";
                $uploadOk = 1;
            } else {
                $this->errors[]= "File is not an image.<br>";
                $uploadOk = 0;
            }

        // Check if file already exists
        if (file_exists($target_file)) {
            $this->errors[]= "Sorry, file already exists.<br>";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 5000000) {
            $this->errors[]= "Sorry, your file is too large.<br>";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            $this->errors[]= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $this->errors[]= "Sorry, your file was not uploaded.<br>";
            if(!empty($this->errors)){
                self::displayValidationErrors($this->errors);
            }
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $this->errors[]= "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.<br>";
                return htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
            } else {
                $this->errors[]= "Sorry, there was an error uploading your file.<br>";
            }
        }
        if(!empty($this->errors)){
            self::displayValidationErrors($this->errors);
        }
    }

    protected function setAttributesForUpdate($params){
        // filter the array for null values or false or empty
        $f_params = array_filter($params,"strlen");

        // create part of the SQL query ex: name=:name, title=:title
        $keys_values = [];
        foreach ($f_params as $key => $param){
            $keys_values[] = $key. " = :".$key;
        }
        return $keys = implode(",", $keys_values);
    }

























} // END OF CLASS