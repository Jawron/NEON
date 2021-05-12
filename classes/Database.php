<?php
require_once __DIR__. '../../config.php';

class Database{

    public $connection = null;


    // this function is called everytime this class is instantiated
    public function __construct( $dbhost = DB_HOST, $dbname = DB_NAME, $username = DB_USER, $password    = DB_PASS){

        try{

            $this->connection = new PDO("mysql:host={$dbhost};dbname={$dbname};", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }



}

$database = new Database();