<?php
// include database and object files
// include_once '[filename]': includes and evaluates the specified file(only once)
include_once '../config/database.php';
include_once '../objects/user.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare user object
$user = new User($db);
// set ID property of user to be edited
// isset([variable]) return TRUE when variable exists and is NOT NULL
// (exp1) ? (exp2) : (exp3) exp1 jugs, exp2 - True var, exp3 - False var
$user->username = isset($_GET['username']) ? $_GET['username'] : die();
$user->password = base64_encode(isset($_GET['password']) ? $_GET['password'] : die());
// read the details of user to be edited
$stmt = $user->login();
if($stmt->rowCount() > 0){
    // get retrieved row
    // PDO::FETCH_ASSOC tells PDO to return the result as an associative array
    // PDOStatement::fetch: fetches the next row from a result set
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // create array
    $user_arr=array(
        "status" => true,
        "message" => "Successfully Login!",
        "id" => $row['id'],
        "username" => $row['username']
    );
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "Invalid Username or Password!",
    );
}
// make it json format
print_r(json_encode($user_arr));

echo '<a href="../../index.php">Enter the mainpage</a>';
?>