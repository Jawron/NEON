<?php
include(realpath($_SERVER["DOCUMENT_ROOT"])). '/neon/includes/header.php';
$post = new Posts();
?>
<?php

?>
<h1>POSTS</h1>
<?php echo $_SERVER["DOCUMENT_ROOT"] . '/neon/includes/add_post.php'; ?>
<a href="add_post.php"><h3>Add a Post</h3></a>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Author</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Featured Image</th>
                    <th scope="col">Created</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $allPosts = $post->displayAllPosts();

                foreach ($allPosts as $post){
                ?>

                    <tr>
                        <th scope="row"><?php echo $post['id']?></th>
                        <td><?php echo $post['title']?></td>
                        <td><?php echo $post['content']?></td>
                        <td><?php echo $post['author']?></td>
                        <td><?php echo $post['tags']?></td>
                        <td><?php echo $post['featured_image']?></td>
                        <td><?php echo $post['created_at']?></td>
                    </tr>

                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Author</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Featured Image</th>
                    <th scope="col">Created</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $allPosts = $post->displayAllPosts();

                foreach ($allPosts as $post){
                    ?>

                    <tr>
                        <th scope="row"><?php echo $post['id']?></th>
                        <td><?php echo $post['title']?></td>
                        <td><?php echo $post['content']?></td>
                        <td><?php echo $post['author']?></td>
                        <td><?php echo $post['tags']?></td>
                        <td><?php echo $post['featured_image']?></td>
                        <td><?php echo $post['created_at']?></td>
                    </tr>

                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>