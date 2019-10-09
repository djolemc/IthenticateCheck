<?php

//Pravi niz sa spiskom pojedincanih casopisa
function arrayCreate ($array) {
    foreach ($array as $journal) {
        $mails["$journal[2]"] = [
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

    return $mails;

}