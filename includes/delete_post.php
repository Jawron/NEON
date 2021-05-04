<?php
include(realpath($_SERVER["DOCUMENT_ROOT"])). '/neon/includes/header.php';
$post = new Posts();

$id = $_GET['id'];


$post->deletePost($id);

header('Location: ../includes/posts.php');


?>
