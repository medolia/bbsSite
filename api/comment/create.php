<?php

// include database and object files
include_once '../config/database.php';
include_once '../objects/comment.php';

// get database connnection
$database = new Database();
$db = $database->getConnection();

// prepare article object
$comment = new Comment($db);

// set article property values
$comment->user_id = $_POST['user_id'];
$comment->article_id = $_POST['article_id'];
$comment->content = $_POST['content'];

// create the article
if($comment->create()) {
    $comment_arr = array(
        "status" => true,
        "message" => "Your comment has been sent",
        "user_id" => $comment->user_id,
        "article_id" => $comment->article_id,
        "content" => $comment->content
    );
}
else {
    $comment_arr = array(
        "status" => false,
        "message" => "Comment failed"
    );
}

print_r(json_encode($comment_arr));
?>