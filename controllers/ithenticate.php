<?php
/*
 * TODO  srediti fajl
 * TODO jquery modal
 */

require '../config/init.php';
require '../vendor/autoload.php';

use bsobbe\ithenticate\Ithenticate;
error_reporting(0);
ini_set('max_execution_time', 0);
//
var_dump($_POST);
die();


$user=ITHUSER;
$pass= base64_decode(ITHPASS);
$ith = new Ithenticate($user,$pass);
$sid = $ith->getSid();


if (isset($_POST['getFileSize'])) {
    $filename=$_POST['file'];
   $file = new FileHandler();
   $size = $file->getFileSize($filename);


    echo $size;


    die();
}


if (isset($_POST['form_process'])){
    echo json_encode(array_values($_SESSION['form']));
    unset($_POST['form_process']);
    die();
}


if (isset($_POST['status'])) {
//var_dump($_POST);
//die();
//    sleep(1);
    $essay_title =$_POST['niz'][1];
    $author_firstname = $_POST['niz'][3];
    $author_lastname = $_POST['niz'][2];
//  $filename = $_FILES['file']['name'];
    $filename =' proba.pdf';
    $document_content= file_get_contents('../assets/files/2.pdf');
    $folder_number='1643419';

   // $id = $ith->submitDocument($essay_title, $author_firstname, $author_lastname, $filename, $document_content, $folder_number);

  $id='50789358'; //false
  //  $id='50784425';
   // $id2='50496982';


    echo $id;


    die();
}



if (isset($_POST['id'])){
   $id=$_POST['id'];
    $documentStatus = $ith-> fetchDocumentReportState($id);
    $report_id = $ith->fetchDocumentReportId($id);

    $result=[];
    array_push($result, $documentStatus,$report_id);

    echo json_encode($result);

    die();
}



$template = new Template("../templates/ithenticate.php");

$_SESSION['form'] = $_POST['form'];

echo $template;



//LISTA SVIH FOLDERA
//$ith = new Ithenticate($user,$pass);

//var_dump($ith);
//$list = $ith->fetchFolderList();
//$sid = $ith->getSid());




//Assign vars

//$template->result = $list;
//$template->result1 = "aaa";








