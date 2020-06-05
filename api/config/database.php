<?php
class Database{
 
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "testsite";
    private $username = "root";
    private $password = "";
    public $conn;
 
    // get the database connection
    public function getConnection(){
 
        $this->conn = null;

        // PDO: PHP Data Object(similar in JAVA)
        // dsn: data source name, [driver]:host=[hostname];dbname=[db_name], [username], [password]
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>