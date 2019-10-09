<?php
/**
 * Created by PhpStorm.
 * User: Dragoljub
 * Date: 10/2/2019
 * Time: 3:13 PM
 */

require '../config/init.php';
require '../helpers/array_functions.php';
require  '../vendor/autoload.php';


$template = new Template("../templates/mail.php");




if (isset($_SESSION['form'])) {

    $journals = $_SESSION['form'];
    $mails = arrayCreate($journals);
    $mails = prepareMail($journals, $mails);
    $length = count($mails);
//echo $length;
    $mailObjects = array();

//Create mail objects
    foreach ($mails as $mail) {
        $mailObjects[] = new SendMail($mail);
    }

//Assign template vars
    $template->mailObjects = $mailObjects;

}

echo $template;