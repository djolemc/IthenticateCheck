<?php //require '../config/init.php';
require __DIR__ . '../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;




//print_r($_POST);

$mail_to = $_POST['mail_to'];
$subject = $_POST['subject'];
$message_body = $_POST['message_body'];
$headers = $_POST['headers'];

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'localhost';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 25;

$mail->setFrom('djole@example.com', 'Test Mailera');
$mail->addAddress('dragoljubd@gmail.com');
$mail->addBCC('dragoljubd@gmail.com');
$mail->Subject = $subject;
$mail->isHTML(true);
$mail->Body    = $message_body;


$mail->send();

echo 'Message has been sent';

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}






