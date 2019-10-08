<?php
/**
 * Created by PhpStorm.
 * User: Dragoljub
 * Date: 10/2/2019
 * Time: 3:13 PM
 */

require '../config/init.php';
require __DIR__ . '../../vendor/autoload.php';


$x='<pre class=\'xdebug-var-dump\' dir=\'ltr\'>
<small>C:\wamp64\www\plagijarizam2\controllers\form.php:45:</small>
<b>object</b>(<i>PHPMailer\PHPMailer\PHPMailer</i>)[<i>4</i>]
  <i>public</i> \'Priority\' <font color=\'#888a85\'>=&gt;</font> <font color=\'#3465a4\'>null</font>
  <i>public</i> \'CharSet\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'UTF-8\'</font> <i>(length=5)</i>
  <i>public</i> \'ContentType\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'text/html\'</font> <i>(length=9)</i>
  <i>public</i> \'Encoding\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'8bit\'</font> <i>(length=4)</i>
  <i>public</i> \'ErrorInfo\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
  <i>public</i> \'From\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'djole@example.com\'</font> <i>(length=17)</i>
  <i>public</i> \'FromName\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'Probni mail\'</font> <i>(length=11)</i>
  <i>public</i> \'Sender\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'djole@example.com\'</font> <i>(length=17)</i>
  <i>public</i> \'Subject\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\' Provereni radovi u okviru iThenticate-a\'</font> <i>(length=40)</i>
  <i>public</i> \'Body\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\' Poštovani,&lt;br&gt;&lt;br&gt;Sledeći radovi su provereni u okviru iThenticate-a na plagijarizam:&lt;br&gt;&lt;ol&gt;&lt;li&gt;Naslov rada 02\12345\&lt;/li&gt;&lt;/ol&gt;Rezultate možete pogledati prijavljivanjem putem vašeg naloga u okviru iThenticate-a. Na stranici &lt;br&gt;https://app.ithenticate.com/login upotrebite korisničke parametre:&lt;ul&gt;&lt;li&gt;za email: &lt;strong&gt;proba&lt;/strong&gt;&lt;/li&gt;&lt;li&gt;za Password: &lt;strong&gt;proba&lt;/strong&gt;&lt;/li&gt;&lt;/ul&gt;&lt;br&gt;S poštovanjem, Razvojni tim SCIndeksa\'</font> <i>(length=438)</i>
  <i>public</i> \'AltBody\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
  <i>public</i> \'Ical\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
  <i>protected</i> \'MIMEBody\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
  <i>protected</i> \'MIMEHeader\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
  <i>protected</i> \'mailHeader\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
  <i>public</i> \'WordWrap\' <font color=\'#888a85\'>=&gt;</font> <small>int</small> <font color=\'#4e9a06\'>0</font>
  <i>public</i> \'Mailer\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'smtp\'</font> <i>(length=4)</i>
  <i>public</i> \'Sendmail\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'/usr/sbin/sendmail\'</font> <i>(length=18)</i>
  <i>public</i> \'UseSendmailOptions\' <font color=\'#888a85\'>=&gt;</font> <small>boolean</small> <font color=\'#75507b\'>true</font>
  <i>public</i> \'ConfirmReadingTo\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
  <i>public</i> \'Hostname\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
  <i>public</i> \'MessageID\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
  <i>public</i> \'MessageDate\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
  <i>public</i> \'Host\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'localhost\'</font> <i>(length=9)</i>
  <i>public</i> \'Port\' <font color=\'#888a85\'>=&gt;</font> <small>int</small> <font color=\'#4e9a06\'>25</font>
  <i>public</i> \'Helo\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
  <i>public</i> \'SMTPSecure\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'tls\'</font> <i>(length=3)</i>
  <i>public</i> \'SMTPAutoTLS\' <font color=\'#888a85\'>=&gt;</font> <small>boolean</small> <font color=\'#75507b\'>true</font>
  <i>public</i> \'SMTPAuth\' <font color=\'#888a85\'>=&gt;</font> <small>boolean</small> <font color=\'#75507b\'>true</font>
  <i>public</i> \'SMTPOptions\' <font color=\'#888a85\'>=&gt;</font> 
    <b>array</b> <i>(size=0)</i>
      <i><font color=\'#888a85\'>empty</font></i>
  <i>public</i> \'Username\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
  <i>public</i> \'Password\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
  <i>public</i> \'AuthType\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
  <i>protected</i> \'oauth\' <font color=\'#888a85\'>=&gt;</font> <font color=\'#3465a4\'>null</font>
  <i>public</i> \'Timeout\' <font color=\'#888a85\'>=&gt;</font> <small>int</small> <font color=\'#4e9a06\'>300</font>
  <i>public</i> \'dsn\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
  <i>public</i> \'SMTPDebug\' <font color=\'#888a85\'>=&gt;</font> <small>int</small> <font color=\'#4e9a06\'>0</font>
  <i>public</i> \'Debugoutput\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'html\'</font> <i>(length=4)</i>
  <i>public</i> \'SMTPKeepAlive\' <font color=\'#888a85\'>=&gt;</font> <small>boolean</small> <font color=\'#75507b\'>false</font>
  <i>public</i> \'SingleTo\' <font color=\'#888a85\'>=&gt;</font> <small>boolean</small> <font color=\'#75507b\'>false</font>
  <i>protected</i> \'SingleToArray\' <font color=\'#888a85\'>=&gt;</font> 
    <b>array</b> <i>(size=0)</i>
      <i><font color=\'#888a85\'>empty</font></i>
  <i>public</i> \'do_verp\' <font color=\'#888a85\'>=&gt;</font> <small>boolean</small> <font color=\'#75507b\'>false</font>
  <i>public</i> \'AllowEmpty\' <font color=\'#888a85\'>=&gt;</font> <small>boolean</small> <font color=\'#75507b\'>false</font>
  <i>public</i> \'DKIM_selector\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
  <i>public</i> \'DKIM_identity\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
  <i>public</i> \'DKIM_passphrase\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
  <i>public</i> \'DKIM_domain\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
  <i>public</i> \'DKIM_copyHeaderFields\' <font color=\'#888a85\'>=&gt;</font> <small>boolean</small> <font color=\'#75507b\'>true</font>
  <i>public</i> \'DKIM_extraHeaders\' <font color=\'#888a85\'>=&gt;</font> 
    <b>array</b> <i>(size=0)</i>
      <i><font color=\'#888a85\'>empty</font></i>
  <i>public</i> \'DKIM_private\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
  <i>public</i> \'DKIM_private_string\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
  <i>public</i> \'action_function\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
  <i>public</i> \'XMailer\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
  <i>protected</i> \'smtp\' <font color=\'#888a85\'>=&gt;</font> <font color=\'#3465a4\'>null</font>
  <i>protected</i> \'to\' <font color=\'#888a85\'>=&gt;</font> 
    <b>array</b> <i>(size=2)</i>
      0 <font color=\'#888a85\'>=&gt;</font> 
        <b>array</b> <i>(size=2)</i>
          0 <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'dragoljub@ceon.rs\'</font> <i>(length=17)</i>
          1 <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
      1 <font color=\'#888a85\'>=&gt;</font> 
        <b>array</b> <i>(size=2)</i>
          0 <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'test@test.com\'</font> <i>(length=13)</i>
          1 <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
  <i>protected</i> \'cc\' <font color=\'#888a85\'>=&gt;</font> 
    <b>array</b> <i>(size=0)</i>
      <i><font color=\'#888a85\'>empty</font></i>
  <i>protected</i> \'bcc\' <font color=\'#888a85\'>=&gt;</font> 
    <b>array</b> <i>(size=1)</i>
      0 <font color=\'#888a85\'>=&gt;</font> 
        <b>array</b> <i>(size=2)</i>
          0 <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'dragoljubd@gmail.com\'</font> <i>(length=20)</i>
          1 <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
  <i>protected</i> \'ReplyTo\' <font color=\'#888a85\'>=&gt;</font> 
    <b>array</b> <i>(size=0)</i>
      <i><font color=\'#888a85\'>empty</font></i>
  <i>protected</i> \'all_recipients\' <font color=\'#888a85\'>=&gt;</font> 
    <b>array</b> <i>(size=3)</i>
      \'dragoljub@ceon.rs\' <font color=\'#888a85\'>=&gt;</font> <small>boolean</small> <font color=\'#75507b\'>true</font>
      \'test@test.com\' <font color=\'#888a85\'>=&gt;</font> <small>boolean</small> <font color=\'#75507b\'>true</font>
      \'dragoljubd@gmail.com\' <font color=\'#888a85\'>=&gt;</font> <small>boolean</small> <font color=\'#75507b\'>true</font>
  <i>protected</i> \'RecipientsQueue\' <font color=\'#888a85\'>=&gt;</font> 
    <b>array</b> <i>(size=0)</i>
      <i><font color=\'#888a85\'>empty</font></i>
  <i>protected</i> \'ReplyToQueue\' <font color=\'#888a85\'>=&gt;</font> 
    <b>array</b> <i>(size=0)</i>
      <i><font color=\'#888a85\'>empty</font></i>
  <i>protected</i> \'attachment\' <font color=\'#888a85\'>=&gt;</font> 
    <b>array</b> <i>(size=0)</i>
      <i><font color=\'#888a85\'>empty</font></i>
  <i>protected</i> \'CustomHeader\' <font color=\'#888a85\'>=&gt;</font> 
    <b>array</b> <i>(size=0)</i>
      <i><font color=\'#888a85\'>empty</font></i>
  <i>protected</i> \'lastMessageID\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
  <i>protected</i> \'message_type\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
  <i>protected</i> \'boundary\' <font color=\'#888a85\'>=&gt;</font> 
    <b>array</b> <i>(size=0)</i>
      <i><font color=\'#888a85\'>empty</font></i>
  <i>protected</i> \'language\' <font color=\'#888a85\'>=&gt;</font> 
    <b>array</b> <i>(size=0)</i>
      <i><font color=\'#888a85\'>empty</font></i>
  <i>protected</i> \'error_count\' <font color=\'#888a85\'>=&gt;</font> <small>int</small> <font color=\'#4e9a06\'>0</font>
  <i>protected</i> \'sign_cert_file\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
  <i>protected</i> \'sign_key_file\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
  <i>protected</i> \'sign_extracerts_file\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
  <i>protected</i> \'sign_key_pass\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
  <i>protected</i> \'exceptions\' <font color=\'#888a85\'>=&gt;</font> <small>boolean</small> <font color=\'#75507b\'>true</font>
  <i>protected</i> \'uniqueid\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'\'</font> <i>(length=0)</i>
</pre>Message could not be sent. Mailer Error: SMTP connect() failed. https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting';

echo $x;


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