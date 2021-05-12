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


$session->logout();
Main::redirect('../index.php');
exit();







?>