<?php
include(realpath($_SERVER["DOCUMENT_ROOT"])). '/neon/includes/header.php';
$post = new Posts();
?>
<?php

?>
<h1>POSTS</h1>
<?php echo $_SERVER["DOCUMENT_ROOT"] . '/neon/includes/add_post.php'; ?>
<a href="add_post.php"><h3>Add a Post</h3></a>

<section class="container" id="main-content">
    <div class="row">
        <div class="col-md-12">

            <!-- Tab panes -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="active-tab" data-bs-toggle="tab" data-bs-target="#active-posts" type="button" role="tab" aria-controls="active-posts" aria-selected="true">Active Posts</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="trashed-tab" data-bs-toggle="tab" data-bs-target="#trashed" type="button" role="tab" aria-controls="trashed" aria-selected="false">Trashed</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="false">All</button>
                </li>

            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="active-posts" role="tabpanel" aria-labelledby="home-tab">
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
                            <th scope="col" colspan="2">Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $activePosts = $post->displayActivePosts();

                        foreach ($activePosts as $activePost){
                            ?>

                            <tr>
                                <th scope="row"><?php echo $activePost['id']?></th>
                                <td><?php echo $activePost['title']?></td>
                                <td><?php echo $activePost['content']?></td>
                                <td><?php echo $activePost['author']?></td>
                                <td><?php echo $activePost['tags']?></td>
                                <td><?php echo $activePost['featured_image']?></td>
                                <td><?php echo $activePost['created_at']?></td>
                                <td><a href="../includes/edit_post.php?id=<?php echo $activePost['id'] ?>">EDIT</a></td>
                                <td><a href="../includes/remove_post.php?id=<?php echo $activePost['id'] ?>">REMOVE</a></td>
                            </tr>

                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="trashed" role="tabpanel" aria-labelledby="trashed-tab">
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
                            <th scope="col" colspan="2">Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $trashedPosts = $post->displayTrashedPosts();

                        foreach ($trashedPosts as $trashedPost){
                            ?>

                            <tr>
                                <th scope="row"><?php echo $trashedPost['id']?></th>
                                <td><?php echo $trashedPost['title']?></td>
                                <td><?php echo $trashedPost['content']?></td>
                                <td><?php echo $trashedPost['author']?></td>
                                <td><?php echo $trashedPost['tags']?></td>
                                <td><?php echo $trashedPost['featured_image']?></td>
                                <td><?php echo $trashedPost['created_at']?></td>
                                <td><a href="../includes/edit_post.php?id=<?php echo $trashedPost['id'] ?>">EDIT</a></td>
                                <td><a href="../includes/delete_post.php?id=<?php echo $trashedPost['id'] ?>">REMOVE</a></td>
                            </tr>

                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="all" role="tabpanel" aria-labelledby="all-tab">

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
                            <th scope="col" colspan="2">Options</th>
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
                                <td><a href="../includes/edit_post.php?id=<?php echo $post['id'] ?>">EDIT</a></td>
                                <td><a href="../includes/remove_post.php?id=<?php echo $post['id'] ?>">REMOVE</a></td>
                            </tr>

                        <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>









            <script>
                var firstTabEl = document.querySelector('#myTab li:last-child a')
                var firstTab = new bootstrap.Tab(firstTabEl)
                firstTab.show()
            </script>
        </div>
    </div>
</section>
<section class="container" id="post-comments">

</section>
<?php
include(realpath($_SERVER["DOCUMENT_ROOT"])). '/neon/includes/footer.php';
?>