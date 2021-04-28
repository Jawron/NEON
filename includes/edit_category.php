
<?php
include(realpath($_SERVER["DOCUMENT_ROOT"])). '/neon/includes/header.php';
$categories = new Categories();
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <?php


            if (isset($_POST['update_category'])) {
                $new_name = $_POST['new_cat'];
                $id = $_GET['id'];

                $params = [
                    'id' => $id,
                    'name' => $new_name
                ];
                $categories->updateCategory($params);

            }

            ?>

            <form method="post" action="">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Category</label>
                    <div id="Help" class="form-text">Modify the name of your category.</div>
                    <input type="text" name="new_cat" class="form-control" id="" placeholder="<?php echo $_GET['name'] ?>" aria-describedby="Help">

                </div>
                <button type="submit" name="update_category" class="btn btn-primary">Modify</button>
                <a href="categories.php" class="btn btn-primary" > Add a new category</a>
            </form>
        </div>
        <div class="col-md-6">
            <?php
            include "display_categories.php";
            ?>
        </div>
    </div>
</div>






