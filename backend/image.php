
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


?>

<?php
$photo = new Photo();
if(isset($_POST['submit'])){

    $photo->uploadImages();

    Main::redirect('uploadimage.php');


}
