<?php


include (realpath($_SERVER["DOCUMENT_ROOT"])) . '/neon/includes/header.php';
$categories = new Categories();

$id = $_GET['id'];

$categories->deleteCategory($id);

header('Location: ../includes/categories.php');

