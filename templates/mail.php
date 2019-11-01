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

<div id="mail_forms">

    <?php
    if (isset($mailObjects)) {
          echo '<h5 id="za_slanje"><strong>Мailovi za slanje:</strong></h5>';

        foreach ($mailObjects as $mail): ?>

            <?php if ($mail->mail_send == true): ?>

<!--                <form class="mail_forma" onsubmit="myButtonValue.disabled = true; return true;">-->
                <form class="mail_forma">
                    <p><span id="journal">Časopis:   </span><?php echo $mail->journal; ?></span></p>
                    <span id="span_to">To: </span></span>  <input class="mail_send" name="mail_to" type="text"
                                                                  value=" <?php echo $mail->mail_to; ?>"><br>
                    <span>Subject: </span> <input class="mail_send" type="text" name="subject"
                                                  value=" <?php echo $mail->subject; ?>"><br>
                    <textarea class="mytextarea" name="message_body" id="" cols="30"
                              rows="12"> <?php echo $mail->mailBody ?></textarea>
                    <input type="hidden" name="headers" value=" <?php echo $mail->headers; ?>">

                    <input type="submit" name="myButtonValue" class='mail_button' value="Pošalji">
                    <span class="msg"></span>
                </form>

            <?php endif; endforeach;
    }
    else { ?>

    <div>

    <i id="file_icon" class="fa fa-envelope-o" aria-hidden="true"></i>
    <p class="file_text">Trenutno nema e-mailova za slanje</p>

</div>


<?php } ?>

</div>


<?php include '../includes/footer.php'; ?>


