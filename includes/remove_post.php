<?php
include(realpath($_SERVER["DOCUMENT_ROOT"])). '/neon/includes/header.php';
$post = new Posts();

$id = $_GET['id'];
$deleted_at = date("Y-m-d H:i:s");

$params= [
    'id' => $id,
    'deleted_at' => $deleted_at
];

$post->trashPost($params);

header('Location: ../includes/posts.php');


?>
