<?php
/**
 * Created by PhpStorm.
 * User: Dragoljub
 * Date: 10/2/2019
 * Time: 3:13 PM
 */

require '../config/init.php';
require __DIR__ . '../../vendor/autoload.php';


$template = new Template("../templates/mail.php");





$journals = $_SESSION['form'];


//var_dump($journals);


$mails=[];

foreach ($journals as $journal) {
//     $journal[2] = $journal[2];
     $mails["$journal[2]"] = [
         'titles'=>[],
         'data'=>[]
     ];
}
$length= count($mails);
//echo $length;

foreach ($journals as $journal) {

    if (array_key_exists("$journal[2]", $mails)) {
        array_push($mails["$journal[2]"]['titles'], $journal[3]);

        if (!in_array($journal[10], $mails["$journal[2]"]['data'])) {
            array_push($mails["$journal[2]"]['data'], $journal[2]);
        };

        if (!in_array($journal[10], $mails["$journal[2]"]['data'])) {
            array_push($mails["$journal[2]"]['data'], $journal[10]);
        };
        if (!in_array($journal[7], $mails["$journal[2]"]['data'])) {
            array_push($mails["$journal[2]"]['data'], $journal[7]);
        };
        if (!in_array($journal[8], $mails["$journal[2]"]['data'])) {
            array_push($mails["$journal[2]"]['data'], $journal[8]);
        };
    };
}

//var_dump($mails);

$mailObjects = array();
foreach ($mails as $mail) {

    $mailObjects[] = new SendMail($mail);
}









//Assign vars

$template->mailObjects = $mailObjects;

echo $template;