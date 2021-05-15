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
$user = new User();
?>
<?php
if(isset($_POST['create'])){

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $usernameAdded = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $recoveryEmail = $_POST['recoveryEmail'];




    $params =[
            'firstName' =>$firstName,
            'lastName' =>$lastName,
            'username' =>$usernameAdded,
            'email' =>$email,
            'password' =>$password,
            'role' =>$role,
            'dob' =>$dob,
            'phone' =>$phone,
            'recoveryEmail' =>$recoveryEmail
    ];

    $id = $user->addUser($params);
    if($id){
        $session->message('User created Successfully');
        header('Location: edit_user.php?id='.$id);
        exit();

    }








}



?>



<div class="container">
    <div class="row">
        <form method="post" action="">
            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" name="firstName" class="form-control" id="firstName">
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" name="lastName" class="form-control" id="lastName">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <input type="text" name="role" class="form-control" id="role">
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">DOB</label>
                <input type="date" name="dob" class="form-control" id="dob">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" id="phone">
            </div>
            <div class="mb-3">
                <label for="recoveryEmail" class="form-label">Recovery Email</label>
                <input type="text" name="recoveryEmail" class="form-control" id="recoveryEmail">
            </div>

            <button type="submit" name="create" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>