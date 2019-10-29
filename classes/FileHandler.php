<?php

/**
 * Created by PhpStorm.
 * User: Dragoljub
 * Date: 10/1/2019
 * Time: 10:49 AM
 * Load most current file(s) from server
 * todo Napisati klasu
 */
class FileHandler
{

    private $path;
    private $filesize;

    public function __construct($path)
    {
        $this->path = $path;

    }


    public function getFiles() {




    }


    public function getFileSize($filename) {

        $filename = "../assets/files/".$filename;

        return round(filesize($filename)/1024/1024);
//        $this->getFileSize("");



    }



//

}