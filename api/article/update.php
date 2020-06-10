<?php

// include database and object files
include_once '../config/database.php';
include_once '../objects/article.php';

// get database connnection
$database = new Database();
$db = $database->getConnection();

// prepare article object
$article = new Article($db);

// set article properties
// only headline and content are available for updating 
$article->id = $_POST["id"];
$article->headline = $_POST["headline"];
$article->content = $_POST["content"];

// update
if($article->update()) {
    $article_arr = array(
        "status" => true,
        "message" => "Sucessfully Updated!"
    );
}
else {
    $article_arr = array(
        "status" => false,
        "message" => "Error"
    );
}
print_r(json_encode($article_arr));
?>