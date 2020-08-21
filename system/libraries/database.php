<?php
//error_reporting(0); //removes all error-notices from page
class Database {

    private $host = HOST;
    private $database  = DATABASE;
    private $username = USERNAME;
    private $password = PASSWORD;
    protected $db;  //database connection\
    protected $Query;

    public function __construct(){
        try{
            $dsn = "mysql:host=" .$this->host. ";dbname=" .$this->database;
            $this->db = new PDO($dsn,$this->username,$this->password);
            //echo "Database connection is created";
        }catch(PDOException $e){
            echo "Database Connection Error: " .$e->getMessage();

        }
    }
      /*
    Query method will receive all the database queries
    */
    public function Query($query, $options=[]){
        if(empty($options)){    //normal query without where params
            $this->Query = $this->db->prepare($query);
            return $this->Query->execute();
        }else{  //includes where params
            $this->Query = $this->db->prepare($query);
            return $this->Query->execute($options);
        }
    }

    /*
    All count method counts the number of rows from the specified table
    */
    public function AllCount($table_name){

        //SELECT * fron table_name
        $this->Query = $this->db->prepare("SELECT * FROM " .$table_name);
        $this->Query->execute();
        return $this->Query->rowCount();
    }

    /*
    Count method counts the number of rows of a Query
    */
    public function Count(){
        return $this->Query->rowCount();
    }

    /*
    All records method fetch all records as objects from the rewuired Normal Query
    */
    public function AllRecords(){
        return $this->Query->fetchAll(PDO::FETCH_OBJ);
    }

    /*
    Get a single row of records as object
    */
    public function Row(){
        return $this->Query->fetch(PDO::FETCH_OBJ);
    }
  
}
