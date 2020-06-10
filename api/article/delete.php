<?php

// include database and object files
include_once '../config/database.php';
include_once '../objects/article.php';

// get database connnection
$database = new Database();
$db = $database->getConnection();

// prepare article object
$article = new Article($db);

// set article property
$article->id = $_POST["id"];

// remove
if($article->delete()) {
    $article_arr = array(
        "status" => true,
        "message" => "Successfully Removed!"
    );
}
else {
    $article_arr = array(
        "status" => false,
        "message" => "Cannot be deleted or it doesn't exist"
    );
}
print_r(json_encode($article_arr));
?>