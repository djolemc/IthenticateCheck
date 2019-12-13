<?php require '../config/init.php';

require __DIR__ . '../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


/*
 * todo  prebaciti PHPMailer podesavanja u config, srediti fajl
 * salje mailove iz forme preko Ajax poziva
 */

//print_r($_POST);

$mail_to = $_POST['mail_to'];
$subject = $_POST['subject'];
$message_body = $_POST['message_body'];
$headers = $_POST['headers'];
$bcc=$_POST['bcc'];

$mail = new PHPMailer(true);

try {
    $mail->CharSet = 'UTF-8';
    // $mail->isSMTP();
    $mail->Host = 'localhost';
    //$mail->Host = 'ceesprod.mysafeservers.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    //$mail->Port = 587;
    //$mail->Username   = MAIL_USER;                     // SMTP username
    //$mail->Password   = MAIL_PASS;                    //Otkomentarisati user i pass i mail->send() funckiju linija 56

    $mail->Port = 25;


    $mail->setFrom('aseestant@ceon.rs', 'SCIndeks Asistent');
    $mail_to = str_replace(";", ",", $mail_to);
    $to = explode(', ', $mail_to);

//Dodaje primaoce ako ih ima vise
    foreach ($to as $tomail) {
        $mail->addAddress($tomail);
    }

//$mail->addAddress('dragoljubd@gmail.com');

    $mail->addBCC($bcc);
    $mail->Subject = $subject;
    $mail->isHTML(true);
    $mail->Body = $message_body;



//$mail->send();

    echo 'Message has been sent';

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}










