<?php
/*
 * Database Library
 * 
 * includes :
 * ++Database connectivity
 * ++Query syntax
 * ++Queries :
 *      -- AllCount : counts the number of rows from the specified table
 *      --//COMPLETE
 *                  -
*/
error_reporting(0); //removes all error-notices from page
class Database {
    use session;
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

    /*
    Select method accepts only the select query
    */
    public function Select($table_name, $options=""){
        if(empty($options)){
            $this->Query = $this->db->prepare("SELECT * FROM " .$table_name);
            return $this->Query->execute();
        }else{
            $this->Query = $this->db->prepare("SELECT " .$options. " FROM " .$table_name);
            return $this->Query->execute();
        }
    }

    /*
    Select method accepts select query along with where statements
    */
    public function Select_Where($table_name, $options){
        
        foreach($options as $key => $values):
            $columns .= $key . " = ? AND ";
            $db_values .= $values . ",";
        endforeach;
        //remove AND operator from the end statement
        $columns = rtrim($columns , " AND");
        //remove , from the end statement
        $db_values = rtrim($db_values , ",");
        //Assign string separated by , to an array 
        $db_values = explode(",", $db_values);

        //Write the select_where query
        $this->Query = $this->db->prepare("SELECT * FROM " .$table_name . " WHERE " .$columns);
        return $this->Query->execute($db_values);
        // print_r($columns);
        // print_r($db_values);
    }

    /*
    Select method accepts select query along with where statements
    with sorting order=> desc / asc
    */
    public function Select_Where_OrderBy($table_name, $options, $orderbyfield, $order){
        
        foreach($options as $key => $values):
            $columns .= $key . " = ? AND ";
            $db_values .= $values . ",";
        endforeach;
        //remove AND operator from the end statement
        $columns = rtrim($columns , " AND");
        //remove , from the end statement
        $db_values = rtrim($db_values , ",");
        //Assign string separated by , to an array 
        $db_values = explode(",", $db_values);

        //Write the select_where query
        $this->Query = $this->db->prepare("SELECT * FROM " .$table_name . " WHERE " .$columns ." ORDER BY ". $orderbyfield . " " . $order);
        return $this->Query->execute($db_values);
        // print_r($columns);
        // print_r($db_values);
    }

    
    /*
    Delete method 
    */
    public function Delete($table_name, $options){
        
        foreach($options as $key => $values):
            @$columns .= $key . " = ? AND ";
            @$db_values .= $values . ",";
        endforeach;
        //remove AND operator from the end statement
        @$columns = rtrim($columns , " AND");
        //remove , from the end statement
        @$db_values = rtrim($db_values , ",");
        //Assign string separated by , to an array 
        @$db_values = explode(",", $db_values);

        //Write the select_where query
        $this->Query = $this->db->prepare("DELETE FROM " .$table_name . " WHERE " .$columns);
        return $this->Query->execute($db_values);
    }

    /*
    Update method 
    */
    public function Update($table_name, $set_array, $options){
        $set_columns;
        $set_values;
        foreach($set_array as $key => $values):
            $set_columns .= $key . " = ?,";
            $set_values .= $values . ",";
        endforeach;
        //remove , operator from the end statement
        $set_columns = rtrim($set_columns , ",");

        $where_columns;
        $where_values;
        foreach($options as $key => $values):
            $where_columns .= $key . " = ? AND ";
            $where_values .= $values . ",";
        endforeach;
        //remove AND operator from the end statement
        $where_columns = rtrim($where_columns , " AND");

        //combine set values and where values
        $combine = $set_values.$where_values;
        $combine = rtrim($combine, ",");
        //Assign string separated by , to an array 
        $combine = explode(",", $combine);
        //Write the update query
        $this->Query = $this->db->prepare("UPDATE " .$table_name . " SET " .$set_columns . " WHERE " . $where_columns);

        return $this->Query->execute($combine);
     
    }


    /*
    Insert method 
    */
    public function Insert($table_name, $columns_values){
       
        $columns;
        $placeholder;
        $placeholder_values;

        foreach($columns_values as $key => $values ):
            $columns .= $key . ",";
            // Repalce column name on ?,
            $placeholder .= str_replace($key, "?,", $key);
            $placeholder_values .= $values . ",";
        endforeach;
    
        //Remove comma from the end of string/statement
        $columns = rtrim($columns, ",");
        $placeholder = rtrim($placeholder, ",");
        $placeholder_values = rtrim($placeholder_values, ",");
        $placeholder_values = explode(",", $placeholder_values);
        
        //Write Insert Query
        $this->Query = $this->db->prepare("INSERT INTO " . $table_name . "(" . $columns . ") VALUES (" . $placeholder . ")");
        return $this->Query->execute($placeholder_values);
  
    }

       /*
    Insert method 
    */
    public function InsertAndReturnID($table_name, $columns_values){
       
        $columns;
        $placeholder;
        $placeholder_values;

        foreach($columns_values as $key => $values ):
            $columns .= $key . ",";
            // Repalce column name on ?,
            $placeholder .= str_replace($key, "?,", $key);
            $placeholder_values .= $values . ",";
        endforeach;
    
        //Remove comma from the end of string/statement
        $columns = rtrim($columns, ",");
        $placeholder = rtrim($placeholder, ",");
        $placeholder_values = rtrim($placeholder_values, ",");
        $placeholder_values = explode(",", $placeholder_values);
        
        //Write Insert Query
        $this->Query = $this->db->prepare("INSERT INTO " . $table_name . "(" . $columns . ") VALUES (" . $placeholder . ")");
        
        if($this->Query->execute($placeholder_values)){
            $last_id = $this->db->lastInsertId();   //get the inserted record primary key ID
            return $last_id; //insertion successful -> return ID
        }else{
            return false;   //insertion failed -> return 0
        }
        
  
    }
    // SELECT * FROM users INNER JOIN teacher ON users.id = teacher.id

    public function Join($table1, $table2, $condition, $join_name = ""){

        if(empty($join_name)) {
           
           $this->Query = $this->db->prepare("SELECT * FROM " . $table1 . " INNER JOIN " . $table2 . " ON " . $condition);
           return $this->Query->execute();
        } else if($join_name == "LEFT JOIN"){
           $this->Query = $this->db->prepare("SELECT * FROM " . $table1 . " LEFT JOIN " . $table2 . " ON " . $condition);
           return $this->Query->execute();
        } else if($join_name == "RIGHT JOIN"){
          $this->Query = $this->db->prepare("SELECT * FROM " . $table1 . " RIGHT JOIN " . $table2 . " ON " . $condition);
           return $this->Query->execute();
        }
  
    }

}

?>