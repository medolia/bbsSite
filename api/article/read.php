<?php

// include database and object files
include_once '../config/database.php';
include_once '../objects/article.php';

// get database connnection
$database = new Database();
$db = $database->getConnection();

// prepare article object
$article = new Article($db);

// query article
$stmt = $article->read();
if($stmt->rowCount() > 0) {

    $article_arr = array();
    $article_arr["articles"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // extract a record from PDOStatement
        // and push it to the array in every loop
        extract($row);
        $article_item=array(
            "id" => $id,
            "user_id" => $user_id,
            "headline" => $headline,
            "content" => $content,
            "last_edited" => $last_edited
        );
        array_push($article_arr["articles"], $article_item);
    }

    echo json_encode($article_arr["articles"]);
}
else {
    echo json_encode(array());
}