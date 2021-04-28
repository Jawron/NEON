<?php
include(realpath($_SERVER["DOCUMENT_ROOT"])). '/neon/includes/header.php';
$categories = new Categories();
?>
<?php
if(isset($_POST['submit'])){


    $category = $_POST['category'];

    $params = [
        'name' => $category
    ];

    if(!empty($_POST['checkParentCategories'])){
        $arr = $_POST['checkParentCategories'];
        $string = implode(',', $arr);
        $params['parent_id'] = $string;
    }

    if($categories->addCategory($params)){
        header('Location: ../includes/categories.php');
    }
}


?>
<form method="post" action="add_category.php">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Category</label>
        <div id="Help" class="form-text">We'll never share your email with anyone else.</div>
        <input type="text" name="category" class="form-control" id="" aria-describedby="Help">

    </div>

    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="checkbox_parent_cats">
        <label class="form-check-label" for="flexSwitchCheckDefault">Has a Parent?</label>
    </div>
    <div class="mb-3" id="parent_categories">

        <?php if($categories->checkForCategories()) {
            $db_cats = $categories->checkForCategories();
            foreach ($db_cats as $item){
                ?>
                <div class="form-check form-switch">
                    <input class="form-check-input" name="checkParentCategories[]" value="<?php echo $item['id'] ?>" type="checkbox" >
                    <label class="form-check-label" for="flexSwitchCheckDefault"><?php echo $item['name'] ?></label>
                </div>
                <?php
            }
        }
        ?>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Create</button>
</form>


