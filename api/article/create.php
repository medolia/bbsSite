<?php

// include database and object files
include_once '../config/database.php';
include_once '../objects/article.php';

// get database connnection
$database = new Database();
$db = $database->getConnection();

// prepare article object
$article = new Article($db);

//set article property values
$article->id = $_POST['id'];
$article->user_id = $_POST['user_id'];
$article->headline = $_POST['headline'];
$article->content = $_POST['content'];
$article->last_edited = $_POST['last_edited'];

// create the article
if($article->create()) {
    $article_arr=array(
        "status" => true,
        "message" => "Successfully Published!",
        "id" => $article->id,
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
