<?php

// include database and object files
include_once '../config/database.php';
include_once '../objects/article.php';

// get database connnection
$database = new Database();
$db = $database->getConnection();

// prepare article object
$article = new Article($db);

// set article property values
$article->user_id = $_POST['user_id'];
$article->headline = $_POST['headline'];
$article->content = $_POST['content'];

// create the article
if($article->create()) {
    $article_arr=array(
        "status" => true,
        "message" => "Successfully Published!",
        "user_id" => $article->user_id,
        "headline" => $article->headline,
        "content" => $article->content
    );
}
else{
    $article_arr=array(
        "status" => false,
        "message" => "Publish failed"
    );
}

print_r(json_encode($article_arr));
?>
