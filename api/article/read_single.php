<?php

// include database and object files
include_once '../config/database.php';
include_once '../objects/article.php';

// get database connnection
$database = new Database();
$db = $database->getConnection();

// prepare article object
$article = new Article($db);

// set ID property of doctor to be edited
$article->id = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of doctor to be edited
$stmt = $article->read_single();

if($stmt->rowCount() > 0) {
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // create array
    $article_arr = array(
        "id" => $row['id'],
        "user_id" => $row['user_id'],
        "headline" => $row['headline'],
        "content" => $row['content'],
        "last_edited" => $row['last_edited']
    );
}
// json format
print_r(json_encode($article_arr));
?>