<?php
class Article{

    // database connection and table name
    private $conn;
    private $table_name = "articles";

    // object properties
    public $id;
    public $user_id;
    public $headline;
    public $content;
    public $last_edited;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // create article
    function create() {

        // query to insert record
        $query = "INSERT INTO 
                    " . $this->table_name . "  
                  SET
                      user_id=:user_id, headline=:headline, content=:content, last_edited=CURRENT_TIMESTAMP";
    
        // prepare query, return a statement object
        $stmt = $this->conn->prepare($query);

        //sanitize
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));
        $this->headline=htmlspecialchars(strip_tags($this->headline));
        $this->content=htmlspecialchars(strip_tags($this->content));

        // bind values
        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":headline", $this->headline);
        $stmt->bindParam(":content", $this->content);

        // execute 'prepared' query
        if($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        }

        return false;
    
    }

    // read article
    function read() {

        //select all query
        $query = "SELECT *
                FROM
                    " . $this->table_name . "
                ORDER BY
                    id DESC";
        
        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    function update() {

        // query to update record
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    headline=:headline, content=:content, last_edited=CURRENT_TIMESTAMP
                WHERE
                    id=:id";
    
        // prepare query, return a statement object
        $stmt = $this->conn->prepare($query);

        //sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
        $this->headline=htmlspecialchars(strip_tags($this->headline));
        $this->content=htmlspecialchars(strip_tags($this->content));

        // bind values
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":headline", $this->headline);
        $stmt->bindParam(":content", $this->content);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    // delete doctor
    function delete() {

        // query to insert record
        $query = "DELETE FROM 
                    " . $this->table_name . "
                WHERE
                    id=:id";
        
        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize and bind value
        $this->id=htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(":id", $this->id);
        
        if($stmt->execute()) {
            return true;
        }

        return false;

    }
}
?>