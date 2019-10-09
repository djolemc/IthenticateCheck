<?php include '../includes/header.php';
//var_dump($_POST);
//var_dump($_SESSION);
?>


    <div class="login">

        <div id="login_frame">
        </div>

        <div id="login_form">
            <form method="post" action="login.php">
                <i class="fa fa-user-circle" aria-hidden="true"></i>
                <br>
                <input class="userpass" type="text" name='username' placeholder="&#xf21b;   Korisničko ime">
                <br>
                <br>
                <input class="userpass" type="password" name='password' placeholder="&#xf023;   Lozinka">
                <br>
                <!--    <input type="checkbox" name="remember" value="1"><span>Zapamti me</span>-->
                <br>
                <input class='submit' type="submit" name="do_login" value="Uloguj se">
                <?php
                if (isset($msg)) {
                    echo "<span id='msg'>" . $msg . "</span>";
                }
                ?>
            </form>
        </div>
    </div>
</div>

<script>
    $('#msg').delay(3000).fadeOut('slow');
</script>

<script src="../assets/js/script.js"></script>


</body>
</html>

