<?php

/**
 * Created by PhpStorm.
 * User: Dragoljub
 * Date: 10/1/2019
 * Time: 9:50 AM
 * Class for creating Submission object
 */
class Submission
{


    public $journal_title;
    public $journal_id;
    public $author_first;
    public $author_last;
    public $submission_title;
    public $submission_id;
    public $ithenticate_id;
    public $journal_issn;
    public $path;
    public $filenames;
    public $mail_to;
    public $ithenticateUsername;
    public $ithenticatePassword;
    private $sql_base;


    public function __construct($db_row)
    {

        $this->sql_base = new Database(DB_HOST_2, DB_USER_2, DB_PASS_2, DB_NAME_2, DRIVER_2);


        $this->journal_title = $db_row->journal_title;
        $this->journal_id = $db_row->journal_id;
        $this->author_first = $db_row->author_first;
        $this->author_last = $db_row->author_last;
        $this->submission_title = $db_row->submission_title;
        $this->submission_id = $db_row->submission_id;
        $this->ithenticate_id = $db_row->ithenticate_id;
        $this->journal_issn = $db_row->journal_issn;

        $this->setPath();
        $this->setFilenames();
        $this->setIthenticateData();
    }


    private function setPath()
    {

        $this->path = "/files/journals/" . $this->journal_id . '/articles/' . $this->submission_id . '/submission';

    }

    public function getData($data)
    {
        return $this->$data;
    }

    /**
     * @param mixed $filenames
     */
    private function setFilenames()
    {
        $this->filenames = json_encode($this->getFiles());
    }

    private function getFiles()
    {
        $allowed_extensions = array('doc', 'docx', 'pdf', 'rtf');
        $url = $_SERVER['DOCUMENT_ROOT'];
        $dir = $url . "/" . $this->path;

        $files = [];
        if (is_dir($dir)) {

            if (is_dir($dir . "/review") && $this->is_dir_empty($dir . "/review") == false) {
                $dir .= "/review";
                $this->path .= "/review";
            }


            foreach (scandir($dir) as $file) {
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                if (in_array($ext, $allowed_extensions)) {
                    $files[$file] = filemtime($dir . '/' . $file);

                }
            }

            arsort($files);
            $files = array_keys($files);

            $files_final = [];

            foreach ($files as $file) {

                $size = $this->getFileSize($dir, $file);
                array_push($files_final, [$file, $size]);

            }

            if (empty($files_final)) {
                $files_final[0][0] = "Fajl nije pronađen!";
            }
            return $files_final;
        } else

            $files_final[0][0] = "Fajl nije pronađen!";
        return $files_final;


    }

    private function getFileSize($dir, $filename)
    {

        $size = round(filesize($dir . "/" . $filename) / 1024 / 1024);
        return $size;
    }

    private function is_dir_empty($dir)
    {

        if (count(scandir($dir)) == 2) {
            return true;
        } else {
            return false;
        }
    }

    private function setIthenticateData()
    {
        $this->sql_base->query('SELECT * from iThenticateAccounts where ISSN=:issn');
        $this->sql_base->bind(':issn', $this->journal_issn);
        $result = $this->sql_base->single();

        if ($result) {

            $this->ithenticateUsername = $result->Username;
            $this->ithenticatePassword = $result->Password;

            if ($result->InformEmail != null) {
                $this->mail_to = $result->InformEmail;
            } else {

                $this->sql_base->query('SELECT * from ScindeksRelCand_JournalEmails where ISSN=:issn');
                $this->sql_base->bind(':issn', $this->journal_issn);
                $result = $this->sql_base->single();
                $this->mail_to = $result->Email;
            }


        } else
            $this->mail_to = "Časopis nema otvorene parametre za pristup iThenticate-u";


    }
}
