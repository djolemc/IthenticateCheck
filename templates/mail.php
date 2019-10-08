<?php
/**
 * Created by PhpStorm.
 * User: Dragoljub
 * Date: 10/2/2019
 * Time: 3:14 PM
 */

include '../includes/header.php';
include '../includes/nav_menu.php';

?>




<h5>Sledeci mailovi ce biti poslati:</h5>

<?php



foreach ($mailObjects as $mail) {

    if ($mail->mail_send == true):
    ?>
        <form>
            <input type="text" value="<?php echo $mail->mail_to?>">


        </form>

        <?  :endif;


}




?>


