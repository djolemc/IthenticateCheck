<?php
require '../config/init.php';
require '../vendor/autoload.php';
use bsobbe\ithenticate\Ithenticate;
error_reporting(0);
ini_set('max_execution_time', 0);
$user=ITHUSER;
$pass= base64_decode(ITHPASS);
$ith = new Ithenticate($user,$pass);
$sid = $ith->getSid();
$mysql_connection = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME, DRIVER);


$query = ("select journal_id as id, setting_value as name from journal_settings
where locale='sr_RS@latin' and setting_name='name' order by setting_value;");

$mysql_connection->query($query);
$journals = $mysql_connection->resultset();



if (isset($_POST['insertIds'])) {

    $journal_id = $_POST['journal_id'];
    $ithenticate_id = $_POST['ithenticate_id'];

  //  $query = ("INSERT INTO cees_plagiarism_articles_exported (article_id, date_exported) values (:article_id, NOW()) on duplicate key UPDATE date_exported=NOW()");
    $query = ("insert ignore into journal_settings (journal_id, locale, setting_name, setting_value, setting_type) VALUES (:journal_id,'','iThenticateId', :ithenticate_id, 'int')");
    $mysql_connection->query($query);
    $mysql_connection->bind(":journal_id", $journal_id);
    $mysql_connection->bind(":ithenticate_id", $ithenticate_id);


    $mysql_connection->execute();


    $_SESSION['msg']="iThenticateId je uspešno upisan u bazu";



}


$template = new Template("../templates/ithenticate_list.php");

//LISTA SVIH FOLDERA



//$list = $ith->fetchFolderList();

if (!$_SESSION['list']) {

    $_SESSION['list'] = $ith->fetchFolderInGroup();

}






//print_r($list);

$template->journals = $journals;
$template->list= $_SESSION['list'];


echo $template;

