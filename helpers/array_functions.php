<?php

//Pravi niz sa spiskom pojedincanih casopisa
function arrayCreate ($array) {

    foreach ($array as $journal) {
        $mails["$journal[0]"] = [
            'titles'=>[],
            'data'=>[]
        ];
     }

return $mails;
}


//Dodaje podatke casopisu (naziv rada, mail adrese...)
function prepareMail($journals, $mails)
{
    foreach ($journals as $journal) {

        if (array_key_exists("$journal[0]", $mails)) {
            array_push($mails["$journal[0]"]['titles'], $journal[1]);

            if (!in_array($journal[10], $mails["$journal[0]"]['data'])) {
                array_push($mails["$journal[0]"]['data'], $journal[0]);
            };

            if (!in_array($journal[10], $mails["$journal[0]"]['data'])) {
                array_push($mails["$journal[0]"]['data'], $journal[10]);
            };
            if (!in_array($journal[7], $mails["$journal[0]"]['data'])) {
                array_push($mails["$journal[0]"]['data'], $journal[7]);
            };
            if (!in_array($journal[8], $mails["$journal[0]"]['data'])) {
                array_push($mails["$journal[0]"]['data'], $journal[8]);
            };
        };
    }

    return $mails;

}