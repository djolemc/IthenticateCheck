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



/*
 * Od podataka iz forme pravi nizove
 * pogodne za slanje maila (Svakom casopisu dodjeljuje radove
 * i parametre za pristup
 */
if (isset($_SESSION['form'])) {

    $journals = $_SESSION['form'];
    $mails = arrayCreate($journals);
    $mails = prepareMail($journals, $mails);
    $length = count($mails);
//echo $length;


    $mailObjects = array();

 /*
  * PRavi konacne verzije podataka za slanje
  */
    foreach ($mails as $mail) {
        $mailObjects[] = new SendMail($mail);
    }

//Assign template vars
    $template->mailObjects = $mailObjects;

}

echo $template;