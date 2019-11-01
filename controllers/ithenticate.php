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

//$document_content= file_get_contents('../assets/files/3.pdf');
//var_dump($document_content);
//die();


$user=ITHUSER;
$pass= base64_decode(ITHPASS);
$ith = new Ithenticate($user,$pass);
$sid = $ith->getSid();


/*
 * Vraca podatke iz forme na stranicu u JSON formatu
 */
if (isset($_POST['form_process'])){
    echo json_encode(array_values($_SESSION['form']));
    unset($_POST['form_process']);
    die();
}

/*
 * Salje pojedinacne radove na proveru preko iThenticate API-la
 * $_POST['niz'] sadrzi potrebne podatke
 */
if (isset($_POST['status'])) {

    error_log(print_r($_POST,true),0);

    $essay_title =$_POST['niz'][1];
    $author_firstname = $_POST['niz'][3];
    $author_lastname =$_POST['niz'][2];
    $path=$_POST['niz'][11];
    $submission_id=$_POST['niz'][13];

    $filename =$_POST['niz'][4];
    //$document_content= file_get_contents($path."/".$filename);
    $document_content= file_get_contents('../assets/files/3.pdf');
   // echo $document_content;
    $folder_number='1643419';





    //$folder_number=$_POST['niz'][6];

    // Funkcija za slanje na iThenticate
    error_log($essay_title,0);
    error_log($author_firstname,0);
    error_log($author_lastname,0);

    error_log($filename,0);
    error_log($document_content,0);
    error_log($folder_number,0);


    $id = $ith->submitDocument($essay_title, $author_firstname, $author_lastname, $filename, $document_content, $folder_number);

   // error_log($id,0);

    //Obrisati u produkciji
   //  $id=['50789358',$submission_id] ; //false
    //  $id='50784425';
   // $id2='50496982';
    $ids=[$id,$submission_id];

    echo json_encode($ids);


    die();
}



/*
 * Proverava status poslatog dokumenta
 * $id je iThenticate ID koji se dobija prilikom slanja fajla kao odgovor API-ja
 * $documentStatus isPending 0 ili 1
 * $report_id  false ili ID
 */

if (isset($_POST['id'])){


   $id=$_POST['id'];

   $submission_id=$_POST['submission_id'];



    $documentStatus = $ith-> fetchDocumentReportState($id);
    $report_id = $ith->fetchDocumentReportId($id);

    error_log($id,0);
    error_log($submission_id,0);
    error_log($report_id,0);
    error_log(print_r($documentStatus,true),0);


    if ($documentStatus['is_pending'] == 0 && $report_id) {

        $query = ("INSERT INTO cees_plagiarism_articles_exported (article_id, date_exported) values (:article_id, NOW()) on duplicate key UPDATE date_exported=NOW()");
        $mysql_connection->query($query);
        $mysql_connection->bind(":article_id", $submission_id);
        $mysql_connection->execute();

    }

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










