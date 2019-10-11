<?php require '../config/init.php';


/*
 * TODO napisati upit za bazu, obrisati fake podatke i testove za konekcije
 *
 */

//phpinfo();

//$con1 = new Database(DB_HOST,DB_USER,DB_PASS,DB_NAME,DRIVER);
//
//$con2 = new Database(DB_HOST_2,DB_USER_2,DB_PASS_2,DB_NAME_2,DRIVER_2);
////
//$con1->query('select * from authors');
//$con2->query('select * from iThenticateAccounts where Issn=:issn');
////
////
//$con2->bind(':issn', '0085-6320');
//////
//////
//var_dump($con2->resultset());
////
//die();

$red=array(
    "journal_title" => 'Sinteze',
    "journal_id" => 460,
    "author_first" => 'Dragoljub',
    "author_last" => 'Djordjevic',
    "submission_title" => "Naslov rada",
    "submission_id" => 12345,
    "ithenticate_id" => 2345563,
    "journal_issn" => '0085-6320'
);

//$proba = new Submission($red);
//var_dump($proba);
//die();


if (isset($_POST['index_load'])) {
    probna2();

    die();

}

//$_SESSION['is_logged_in'] = true;
$template = new Template("../templates/index.php");

//Assign vars
function probna2()
{
    $rows = [
        array(
            "journal_title" => 'Acta Facultatis Medicae Naissensis',
            "journal_id" => 460,
            "author_first" => 'Katarina',
            "author_last" => 'Filipovic',
            "submission_title" => "Kinematic and Workspace Analysis of a Parallel Rehabilitation Device for HeadNeck Injured Patients ",
            "submission_id" => 12345,
            "ithenticate_id" => 2345563,
            "journal_issn" => '0085-6320'
        ),
        array(
            "journal_title" => 'Sinteze',
            "journal_id" => 460,
            "author_first" => 'Dragoljub',
            "author_last" => 'DJORDJEVIC',
            "submission_title" => "ПОКАЗАТЕЉИ РОДНЕ НЕРАВНОПРАВНОСТИ У ТУРИСТИЧКОЈ ПРИВРЕДИ СРБИЈЕ: СЛУЧАЈ ПЛАТА",
            "submission_id" => 12345,
            "ithenticate_id" => 2345563,
            "journal_issn" => '1452-7405'
        ),
//        array(
//            "journal_title" => 'Sintez333e',
//            "journal_id" => 460,
//            "author_first" => 'Dragoljub',
//            "author_last" => 'Djordjevic',
//            "submission_title" => "Naslov rada 02",
//            "submission_id" => 12345,
//            "ithenticate_id" => 2345563,
//            "journal_issn" => '1452-7405'
//        ),
//        array(
//            "journal_title" => 'Sintez333e',
//            "journal_id" => 460,
//            "author_first" => 'Dragoljub',
//            "author_last" => 'Djordjevic',
//            "submission_title" => "Naslov rada 05",
//            "submission_id" => 12345,
//            "ithenticate_id" => 2345563,
//            "journal_issn" => '1452-7405'
//        ),
//        array(
//            "journal_title" => 'Sintez333e',
//            "journal_id" => 460,
//            "author_first" => 'Dragoljub',
//            "author_last" => 'Djordjevic',
//            "submission_title" => "Naslov rada 020",
//            "submission_id" => 12345,
//            "ithenticate_id" => 2345563,
//            "journal_issn" => '1452-7405'
//        ),
//        array(
//            "journal_title" => 'Sinteze',
//            "journal_id" => 460,
//            "author_first" => 'Dragoljub',
//            "author_last" => 'Djordjevic',
//            "submission_title" => "Naslov rada 2",
//            "submission_id" => 12345,
//            "ithenticate_id" => 2345563,
//            "journal_issn" => '0085-6320'
//        ),
//        array(
//            "journal_title" => 'Sinteze',
//            "journal_id" => 460,
//            "author_first" => 'Dragoljub',
//            "author_last" => 'Djordjevic',
//            "submission_title" => "Naslov rada 3",
//            "submission_id" => 12345,
//            "ithenticate_id" => 2345563,
//            "journal_issn" => '0085-6320'
//        ),
//        array(
//            "journal_title" => 'Ekonomika Preduzeca',
//            "journal_id" => 460,
//            "author_first" => 'Dragoljub',
//            "author_last" => 'Djordjevic',
//            "submission_title" => "Naslov rada",
//            "submission_id" => 12345,
//            "ithenticate_id" => 2345563,
//            "journal_issn" => '1452-7405'
//        ),
//        array(
//            "journal_title" => 'Sinteze',
//            "journal_id" => 460,
//            "author_first" => 'Dragoljub',
//            "author_last" => 'Djordjevic',
//            "submission_title" => "Naslov rada 1",
//            "submission_id" => 12345,
//            "ithenticate_id" => 2345563,
//            "journal_issn" => '0085-6320'
//        ),
//        array(
//            "journal_title" => 'Sintez333e',
//            "journal_id" => 460,
//            "author_first" => 'Dragoljub',
//            "author_last" => 'Djordjevic',
//            "submission_title" => "Naslov rada 01",
//            "submission_id" => 12345,
//            "ithenticate_id" => 2345563,
//            "journal_issn" => '1452-7405'
//        ),
//        array(
//            "journal_title" => 'Srpski arhiv za celokupno lekarstvo',
//            "journal_id" => 460,
//            "author_first" => 'Dragoljub',
//            "author_last" => 'Djordjevic',
//            "submission_title" => "Naslov rada 02",
//            "submission_id" => 12345,
//            "ithenticate_id" => 2345563,
//            "journal_issn" => '1452-7405'
//        ),
//        array(
//            "journal_title" => 'Srpski arhiv za celokupno lekarstvo',
//            "journal_id" => 460,
//            "author_first" => 'Dragoljub',
//            "author_last" => 'Djordjevic',
//            "submission_title" => "Naslov rada 05",
//            "submission_id" => 12345,
//            "ithenticate_id" => 2345563,
//            "journal_issn" => '1452-7405'
//        ),
//        array(
//            "journal_title" => 'Srpski arhiv za celokupno lekarstvo',
//            "journal_id" => 460,
//            "author_first" => 'Dragoljub',
//            "author_last" => 'Djordjevic',
//            "submission_title" => "Naslov rada 020",
//            "submission_id" => 12345,
//            "ithenticate_id" => 2345563,
//            "journal_issn" => '1452-7405'
//        ),
//        array(
//            "journal_title" => 'Sinteze',
//            "journal_id" => 460,
//            "author_first" => 'Dragoljub',
//            "author_last" => 'Djordjevic',
//            "submission_title" => "Naslov rada 2",
//            "submission_id" => 12345,
//            "ithenticate_id" => 2345563,
//            "journal_issn" => '0085-6320'
//        ),
//        array(
//            "journal_title" => 'Sinteze',
//            "journal_id" => 460,
//            "author_first" => 'Dragoljub',
//            "author_last" => 'Djordjevic',
//            "submission_title" => "Naslov rada 3",
//            "submission_id" => 12345,
//            "ithenticate_id" => 2345563,
//            "journal_issn" => '0085-6320'
//        ),
//        array(
//            "journal_title" => 'Ekonomika Preduzeca',
//            "journal_id" => 460,
//            "author_first" => 'Dragoljub',
//            "author_last" => 'Djordjevic',
//            "submission_title" => "Naslov rada",
//            "submission_id" => 12345,
//            "ithenticate_id" => 2345563,
//            "journal_issn" => '1452-7405'
//        ),
    ];
    $arr = [];
    foreach ($rows as $row) {
        $submission = new Submission($row);
        array_push($arr, (array) $submission);
    }

    echo json_encode($arr);


}


$template->username = ["Dragoljub Djordjevic", ''];

echo $template;


function probna()
{

    $fake_data = [
        array(
            "journal" => "Geographica Pannonica",
            "title" => "SPATIAL ANALYSIS OF THALASSEMIA PATIENTS’ PREVALENCE IN DISTRICT GUJRAT, PAKISTAN IN 2015-2016",
            "id" => "22332",
            "path" => "/files",
            "author_first" => "Ameer ",
            "author_last" => "Akram Muhammad",
            "ithenticate_id" => "1643419",
            "issn" => "1234-5678"
        ),
        array(
            "journal" => "Medicinski časopis",
            "title" => "mportance of language for children’s theory of mind: Comparison of verbal and nonverbal theory of mind tasks",
            "id" => "22332",
            "path" => "/files",
            "author_first" => "Dragoljub",
            "author_last" => "Djordjevic",
            "ithenticate_id" => "1643419",
            "issn" => "1234-5678"
        ),
        array(
            "journal" => "Turizam",
            "title" => "PROGNOSIS OF THE DEVELOPMENT OF ORTHOSTATIC HYPOTENSION IN YOUNG MALES WITH HYPERTENSION",
            "id" => "22332",
            "path" => "/files",
            "author_first" => "Iryna ",
            "author_last" => "Kniazkova ",
            "ithenticate_id" => "1643419",
            "issn" => "1234-5678"
        ),
        array(
            "journal" => "Vojnotehnički glasnik / Military Technical Courier",
            "title" => "Multiple-criteria model for optimal off road vehicle selection for passenger transportation: BWM-COPRAS model",
            "id" => "22332",
            "path" => "/files",
            "author_first" => "Lazar ",
            "author_last" => "Savin ",
            "ithenticate_id" => "1643419",
            "issn" => "1234-5678"
        ),


    ];

    echo(json_encode($fake_data));


}


include '../includes/footer.php';
?>