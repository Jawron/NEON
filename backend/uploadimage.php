<?php
include_once "../init.php";
global $session;
if(!$session->isSignedIn()){
    Main::redirect('../login.php');
} else {
    $username = Main::clean($_SESSION['userLogged']['username']);
    $role = Main::clean($_SESSION['userLogged']['role']);
    if($role != 'admin'){
        Main::redirect('../login.php');
    }
}
include_once  'b_includes/header.php';
include_once  'b_includes/top_menu.php';


?>
<?php

if(!empty($session_message)){
    echo $session_message;
}

?>

<form action="image.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload[]" id="fileToUpload" multiple="multiple">
    <input type="submit" value="Upload Image" name="submit">
</form>
