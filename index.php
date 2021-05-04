<?php
include 'includes/header.php';
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" crossorigin="anonymous">
    <link href="assets/css/awesome.css" rel="stylesheet" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-12" style="background-color: #0d6efd">
            LEFT SIDE<br>
            <a href="includes/categories.php" style="display:block;font-weight: 900;font-size:19px;color:#fafafa">CATEGORIES</a>
            <a href="includes/posts.php" style="display:block;font-weight: 900;font-size:19px;color:#fafafa">POSTS</a>
        </div>
        <div class="col-lg-10 col-md-9 col-ms-12">
            <?php

            echo (realpath($_SERVER["DOCUMENT_ROOT"])). '/neon/includes/header.php'
            ?>
        <div class="row">

    </div>
</div>









        <?php
        include(realpath($_SERVER["DOCUMENT_ROOT"])). '/neon/includes/footer.php';
        ?>







