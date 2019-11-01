<?php

require '../config/init.php';

$template = new Template("../templates/login.php");
$user = new User();


//LOGOUT
if (isset($_POST['logout'])) {
    $link = $user->logout();
    echo $link;
    die;
}


//Poruka o neuspelom logovanju
if (isset($_SESSION['msg'])) {
    $template->msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
}
echo $template;


//LOGIN
if (isset($_POST['do_login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user->localLogin($username, $password);

    if (isset($_SESSION['is_logged_in'])) {
        header("Location: index.php");
    } else {
        header("Location: login.php");
//        $_SESSION['msg'] = "Pogrešno korisničko ime ili lozinka!";
    }

}

?>
