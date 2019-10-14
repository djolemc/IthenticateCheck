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
//    public $submission_filesize = 150;
    private $sql_base;


    public function __construct($db_row)
    {

        $this->sql_base = new Database(DB_HOST_2, DB_USER_2, DB_PASS_2, DB_NAME_2, DRIVER_2);


        $this->journal_title = $db_row['journal_title'];
        $this->journal_id = $db_row['journal_id'];
        $this->author_first = $db_row['author_first'];
        $this->author_last = $db_row['author_last'];
        $this->submission_title = $db_row['submission_title'];
        $this->submission_id = $db_row['submission_id'];
        $this->ithenticate_id = $db_row['ithenticate_id'];
        $this->journal_issn = $db_row['journal_issn'];

        $this->setPath();
        $this->setFilenames(123);
        $this->setIthenticateData();
    }


    private function setPath()
    {
        $this->path = "files/journals/" . $this->journal_id . '/articles/' . $this->submission_id . '/submission';

    }

    public function getData($data)
    {
        return $this->$data;
    }

    /**
     * @param mixed $filenames
     */
    private function setFilenames($filenames)
    {

        //TODO  zavrsiti metod kad se napravi upit za plagijarizam
        // $files = new FileHandler($this->path);

        $files = [
            ['1.pdf',10],
            ['2.pdf',24 ],
            ['3.pdf',33 ],
            ['4.pdf',33],
            ['5.pdf',5],
            ['https://a.uguu.se/YqHRAEFwneDo.docx',1]
        ];
//        $files = ['1.pdf'];
        $this->filenames = json_encode($files);

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
