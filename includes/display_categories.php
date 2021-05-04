<?php

?>
<?php
$categories = new Categories();
?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">NAME</th>
        <th scope="col" colspan="2">Options</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $cat_array = $categories->displayCategories();


    foreach ($cat_array as $item){
        ?>
        <tr>
            <th scope="row"><?php echo $item['id']?></th>
            <td><?php echo $item['name']?></td>
            <td><a href="../includes/edit_category.php?id=<?php echo $item['id'] ?>&name=<?php echo $item['name'] ?>">EDIT</a></td>
            <td><a href="../includes/delete_category.php?id=<?php echo $item['id'] ?>">DELETE</a></td>
        </tr>
        <tr>
            <td colspan="4">

            </td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>
