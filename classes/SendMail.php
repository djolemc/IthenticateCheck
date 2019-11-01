<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SendMail
 *
 * @author Dragoljub
 *
 */
class SendMail {

    public $journal;
    public $mail_to;
    public $subject = 'Provereni radovi u okviru iThenticate-a';
    public $ithenticateUser;
    public $ithenticatePass;
    public $mailBody;
    public $headers;
    public $bcc = "djole@ceon.rs";
    public $mail_send = false;
    
    
    public function __construct($mail_data) {
        $this->journal = $mail_data['data'][0];
        $this->mail_to = $mail_data['data'][1];
        //$this->mail_to = 'dragoljub@ceon.rs';

        if ($this->mail_to != 'Časopis nema otvorene parametre za pristup iThenticate-u') {
            $this->ithenticateUser = $mail_data['data'][3];
        //    $this->ithenticateUser = 'proba';
            $this->ithenticatePass = $mail_data['data'][2];
         //   $this->ithenticatePass = 'proba';
            $this->mail_send = true;
        }

        $this->createMailBody($mail_data['titles']);
        $this->createHeaders();

    }

    function createMailBody($titles) {

        $body='';
        $body.='Poštovani,'."<br><br>";
        $body.='Sledeći radovi su provereni u okviru iThenticate-a na plagijarizam:'."<br>";
        $body.='<ol>';
        foreach ($titles as $title) {$body .= '<li>'.$title.'</li>';}
        $body.='</ol>';
        $body.='Rezultate možete pogledati prijavljivanjem putem vašeg naloga u okviru iThenticate-a. Na stranici <br>https://app.ithenticate.com/login upotrebite korisničke parametre:';
        $body.='<ul>';
        $body .= '<li>za email: <strong>'.$this->ithenticateUser.'</strong></li>';
        $body .= '<li>za Password: <strong>'.$this->ithenticatePass.'</strong></li>';
        $body.='</ul>';
        $body.='<br>';
        $body.='S poštovanjem, ';
        $body.='Razvojni tim SCIndeksa';


        $this->mailBody = $body;

    }
//ne koristi se za PHP mailer
    function createHeaders() {

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'Razvojni tim SCIndeksa' . "\r\n";
        $headers .= 'bcc: nikola@ceon.rs' . "\r\n";

        $this->headers = $headers;

    }

    //Na koristi se za PHP mailer
    public function send($mail_to, $subjext, $mailBody, $headers) {
       mail($mail_to, $subjext, $mailBody, $headers);
            }
//
    
}

