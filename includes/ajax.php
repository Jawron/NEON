<?php
include(realpath($_SERVER["DOCUMENT_ROOT"])). '/neon/includes/config.php';
include(realpath($_SERVER["DOCUMENT_ROOT"])). '/neon/includes/init.php';

$comment_id = 100000;

$comment = new Comments();
    $comment_content = $_POST['comment'];
    $params = [
        'post_id' => "POST ID",
        'comment_id' => $comment_id,
        'comment' => $comment_content,
        'date_posted' => date("Y-m-d H:i:s"),
        'active' => 1
    ];
    $comment->addComment($params);

