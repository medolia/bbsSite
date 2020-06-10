<?php

// include database and object files
include_once '../config/database.php';
include_once '../objects/comment.php';

// get database connnection
$database = new Database();
$db = $database->getConnection();

// prepare article object
$comment = new Comment($db);

// query article
$stmt = $comment->read();
if($stmt->rowCount() > 0) {

    $comment_arr = array();
    $comment_arr["articles"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // extract a record from PDOStatement
        // ([key] => [value]) is transformed(extracted) to $[key] = [value]
        extract($row);
        $comment_item=array(
            "id" => $id,
            "user_id" => $user_id,
            "article_id" => $article_id,
            "content" => $content,
            "created" => $created
        );
        array_push($comment_arr["articles"], $comment_item);
    }

    echo json_encode($comment_arr["articles"]);
}
else {
    echo json_encode(array());
}
