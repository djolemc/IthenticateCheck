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

<?php  //echo count ($mailObjects); ?>


<h5 id="za_slanje"><strong>Мailovi za slanje:</strong></h5>

<?php


//var_dump($mailObjects);

foreach ($mailObjects as $mail): ?>

<?php if ( $mail->mail_send == true): ?>

    <form class="mail_forma" onsubmit="myButtonValue.disabled = true; return true;">
        <p> <span id="journal">Časopis:   </span><?php echo $mail->journal; ?></span></p>
        <span id="span_to">To: </span></span>  <input class="mail_send" name="mail_to" type="text" value=" <?php echo $mail->mail_to; ?>"><br>
        <span>Subject: </span> <input class="mail_send" type="text" name="subject" value=" <?php echo $mail->subject; ?>"><br>
        <textarea class="mytextarea" name="message_body" id="" cols="30" rows="12"> <?php echo $mail->mailBody ?></textarea>
        <input type="hidden" name="headers" value=" <?php echo $mail->headers; ?>">

        <input type="submit" class='mail_button' value="Pošalji">
        <span class="msg"></span>
    </form>

<?php  endif;?>
<?php endforeach;?>
</div>


<?php include '../includes/footer.php'; ?>


<script>
    tinymce.init({
        selector: '.mytextarea'
    });

    $(function () {
        $('.mail_forma').on('submit', function (e) {
            var postdata = $(this).serializeArray();

            console.log(postdata);
            $.ajax({
                type: 'post',
                url: 'form.php',
                data: postdata,
                success: function (response) {





                    console.log (response);
                   // location.reload();
                }
            });
            e.preventDefault();
           // e.unbind();
        });

        $('input[type=submit]').click(function () {
            $(this).prop("disabled", true);
            $(this).css("background",'gray');
            $(this).prop("value","Poslato");

            $(this).closest('form').trigger('submit');


        });

    });







</script>