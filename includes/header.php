<?php

include_once "init.php";

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" crossorigin="anonymous">
    <link href="../assets/css/awesome.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Hello, world!</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <nav class="nav" style="justify-content: center;">
            <a class="nav-link active" aria-current="page" href="<?php echo $environment; ?>/neon/index.php">Home</a>
            <a class="nav-link" href="<?php echo $environment; ?>/neon/includes/categories.php">Categories</a>
            <a class="nav-link" href="<?php echo $environment; ?>/neon/includes/posts.php">Posts</a>
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </nav>
    </div>
</div>
