<?php
include(realpath($_SERVER["DOCUMENT_ROOT"])). '/neon/includes/header.php';
$post = new Posts();
$categories = new Categories();
?>
<?php
$id = $_GET['id'];
// displays all categories
$cat = $categories->displayCategories();
//gets the active categories
$activeCategories = $post->getPostCategories($_GET['id']);
//gets post data
$postData = $post->getPostData($id);

if(isset($_POST['update_post'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $tags = $_POST['tags'];
    $author = "Author";
    $featuredImage = "/path/to/the/image";


    $params = [
        'title' => $title,
        'content' => $content,
        'tags' => $tags,
        'author'=> $author,
        'featured_image' => $featuredImage,
    ];

    if(!empty($_POST['postCategories'])){
        $arr = $_POST['postCategories'];
        $string = implode(',', $arr);
        $params['categories'] = $string;
    }

    $post->updatePost($params,$id);

    header('Location: ../includes/posts.php');

}

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <form method="post" action="">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter here the Title for your Post." value="<?php echo $postData['title']?>">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" name="content" id="content" rows="3" placeholder="blog post content" ><?php echo $postData['content']?></textarea>
                </div>
                <div class="mb-3">
                    <label for="tags" class="form-label">Tags</label>
                    <input type="text" class="form-control" name="tags" id="tags" value="<?php echo $postData['tags']?>" placeholder="tags">
                </div>
                <div class="mb-3" style="display: flex;flex-wrap: wrap;
    align-content: space-between;
    justify-content: flex-start;">
                    <?php
                    foreach ($cat as $item){
                        ?>
                        <div class="form-check col-md-4" >
                            <input class="form-check-input" name="postCategories[]" type="checkbox" value="<?php echo $item['id']?>" id="checkbox-<?php echo $item['id']?>"
                            <?php echo in_array($item['id'],$activeCategories) ? "checked" : ' '; ?>>
                            <label class="form-check-label" for="checkbox-<?php echo $item['id']?>">
                                <?php echo $item['name']?>
                            </label>
                        </div>


                        <?php
                    }
                    ?>



                </div>
                <button type="submit" name="update_post" class="btn btn-primary">Submit</button>









            </form>

        </div>
    </div>
</div>
<?php
include(realpath($_SERVER["DOCUMENT_ROOT"])). '/neon/includes/footer.php';
?>