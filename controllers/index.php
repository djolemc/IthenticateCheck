<?php require '../config/init.php';


/*
 *
 *
 */

//phpinfo();

$mysql_connection = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME, DRIVER);


//$con2 = new Database(DB_HOST_2,DB_USER_2,DB_PASS_2,DB_NAME_2,DRIVER_2);
//$con2->query('select * from iThenticateAccounts where Issn=:issn');
//$con2->bind(':issn', '0085-6320');


if (isset($_POST['index_load'])) {
    getSubmissions($mysql_connection);
    die();
}


function getSubmissions($mysql_connection)
{
    $mysql_connection->query('SELECT js.setting_value as journal_title, s.context_id as journal_id, aus2.setting_value AS author_first,  aus.setting_value AS author_last, ss.setting_value AS submission_title, 
s.submission_id, js3.setting_value AS ithenticate_id, js2.setting_value as journal_issn,
CASE WHEN EXISTS(SELECT * FROM edit_decisions WHERE decision = 1 AND submission_id = s.submission_id) THEN 1 ELSE 0 END AS IsApproved
	FROM edit_assignments ea 
	JOIN submissions s ON ea.article_id = s.submission_id
	JOIN cees_plagiarism_journals cpj ON cpj.journal_id = s.context_id 
	JOIN authors a ON a.submission_id=s.submission_id 
	JOIN (SELECT DISTINCT author_id, setting_value FROM author_settings WHERE setting_name = \'familyName\') aus ON aus.author_id= a.author_id 
	JOIN (SELECT DISTINCT author_id, setting_value FROM author_settings WHERE setting_name = \'givenName\') aus2 ON aus2.author_id= a.author_id
	JOIN (SELECT DISTINCT submission_id, setting_value FROM submission_settings WHERE setting_name = \'title\' AND locale = \'en_US\') ss ON ss.submission_id=s.submission_id
	JOIN (SELECT DISTINCT submission_id, setting_value FROM submission_settings WHERE setting_name = \'title\' AND locale = \'sr_RS@latin\') ss2 ON ss2.submission_id=s.submission_id
	JOIN (SELECT DISTINCT journal_id, setting_value FROM journal_settings WHERE setting_name = \'name\') js ON js.journal_id = s.context_id
	JOIN (SELECT DISTINCT journal_id, setting_value FROM journal_settings WHERE setting_name = \'PrintIssn\') js2 ON js2.journal_id = s.context_id
	JOIN (SELECT DISTINCT journal_id, setting_value FROM journal_settings WHERE setting_name = \'iThenticateId\') js3 ON js3.journal_id = s.context_id
	WHERE NOT EXISTS (SELECT * FROM cees_plagiarism_articles_exported WHERE article_id = s.submission_id)
	GROUP BY s.submission_id limit 10 ');


    $results = ($mysql_connection->resultset());

    $arr = [];
    foreach ($results as $row) {
        $submission = new Submission($row);
//        $submission=json_decode(json_encode($submission));
        array_push($arr, (array)$submission);

    }

    echo json_encode($arr);

}


$template = new Template("../templates/index.php");
echo $template;

include '../includes/footer.php';
?>