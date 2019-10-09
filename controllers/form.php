<?php require '../config/init.php';

require __DIR__ . '../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


/*
 * todo  prebaciti PHPMailer podesavanja u config, srediti fajl
 *
 */


//print_r($_POST);

$mail_to = $_POST['mail_to'];
$subject = $_POST['subject'];
$message_body = $_POST['message_body'];
$headers = $_POST['headers'];

$mail = new PHPMailer(true);

try {
    $mail->CharSet = 'UTF-8';
   // $mail->isSMTP();
    $mail->Host = 'localhost';
    //$mail->Host = 'ceesprod.mysafeservers.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    //$mail->Port = 587;
    //$mail->Username   = 'djole@test.ceesprod.mysafeservers.com';                     // SMTP username
    //$mail->Password   = 'HIQ6WmRVQ3';

    $mail->Port = 25;



$mail->setFrom('djole@example.com', 'Probni mail');


$to= explode(', ', $mail_to);


  foreach ($to as $tomail) {
      $mail->addAddress($tomail);
  }

//$mail->addAddress('dragoljubd@gmail.com');


$mail->addBCC('dragoljubd@gmail.com');
$mail->Subject = $subject;
$mail->isHTML(true);
$mail->Body    = $message_body;

//var_dump($mail);

$mail->send();

echo 'Message has been sent';

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}










