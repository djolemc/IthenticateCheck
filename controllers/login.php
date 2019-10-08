<?php

require '../config/init.php';


//var_dump($_POST);
?>



<?php
if (isset($_POST['logout'])) {
    unset($_POST['logout']);
    unset($_SESSION['is_logged_in']);
    $host  = $_SERVER['HTTP_HOST'];
    $link = "http://$host/plagijarizam2/controllers/login.php";
    echo $link;
    die();
}
//


$template = new Template("../templates/login.php");






if (isset($_SESSION['msg'])) {

    $template->msg = $_SESSION['msg'];

    unset($_SESSION['msg']);
}



echo $template;
?>




<?php

if (isset($_POST['do_login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = new User();
    $user->localLogin($username, $password);

//    $_SESSION['is_logged_in']=true;



    if (isset($_SESSION['is_logged_in'])) {
        header("Location: index.php");
    } else {

        header("Location: login.php");
        $_SESSION['msg'] = "Pogrešno korisničko ime ili lozinka!";

    }

}





?>
