<?php
class Comment{

    // database connection and table name
    private $conn;
    private $table_name = "comments";

    // object properties
    public $id;
    public $user_id;
    public $article_id;
    public $content;
    public $created;

    // constructor with $db
    public function __construct($db)
    {
        $this->conn = $db;
    }

    function create() {

        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                  SET 
                        user_id=:user_id, article_id=:article_id, content=:content, created=CURRENT_TIMESTAMP";

        // prepare query
        $stmt = $this->conn->prepare($query);

        //sanitize
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));
        $this->article_id=htmlspecialchars(strip_tags($this->article_id));
        $this->content=htmlspecialchars(strip_tags($this->content));

        // bind values
        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":article_id", $this->article_id);
        $stmt->bindParam(":content", $this->content);

        // execute prepared query
        if($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        }

        return false;

    }

    function read() {

        // query
        $query = "SELECT *
               FROM
                    " . $this->table_name. "
               ORDER BY
                    id DESC";

        // prepare
        $stmt = $this->conn->prepare($query);

        // execute
        $stmt->execute();

        return $stmt;

    }
}