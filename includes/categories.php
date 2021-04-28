<?php
include(realpath($_SERVER["DOCUMENT_ROOT"])). '/neon/includes/header.php';

?>
<div class="container">
<div class="row">
    <div class="col-md-6">
        <?php
        include "add_category.php";
        ?>
    </div>
    <div class="col-md-6">
        <?php
        include "display_categories.php";
        ?>
    </div>
</div>
</div>





























<script>

    let checkboxParentCats = document.getElementById('checkbox_parent_cats');
    let parentCategories = document.getElementById('parent_categories');
    checkboxParentCats.addEventListener('click', function (){
        if (checkbox_parent_cats.checked == true){
            parentCategories.style.display = "block";
        } else {
            parentCategories.style.display = "none";
        }
    })
</script>
