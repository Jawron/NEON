<?php

include_once "../init.php";




$categories = new Categories();




if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $phone = $_POST['phone'];

    $values = [
        'name' => $name,
        'phone' => $phone
    ];
    var_dump($values);
    $sql = "INSERT INTO categories (name, parent_id) VALUES (:name, :phone);";


    $categories->Insert($sql, $values);


}


?>

<form method="post" action="">
    <input type="text" name="name">
    <br>
    <input type="text" name="phone">
    <br>
    <input type="submit" name="submit" value="SEND">
</form>

