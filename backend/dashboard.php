<?php
include_once "../init.php";
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

<h1>Dashboard</h1>













































<?php
include 'b_includes/footer.php';

?>
