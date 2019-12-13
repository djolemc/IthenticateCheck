<?php require '../config/init.php';
$mysql_connection = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME, DRIVER);





if (isset($_POST['index_load'])) {
    getSubmissions($mysql_connection);
    die();
}


if (isset($_POST['name'])) {
    /*
    * submissionId koji ne treba da ide na proveru
    */
    $id = $_POST['id'];

    $query = ("INSERT INTO cees_plagiarism_articles_exported (article_id, date_exported) values (:article_id, NOW()) on duplicate key UPDATE date_exported=NOW()");
    $mysql_connection->query($query);
    $mysql_connection->bind(":article_id", $id);
    //$mysql_connection->bind(":date",$date);
    $mysql_connection->execute();

    echo "Uspesno upisano u bazu";

    die();
}


function getSubmissions($mysql_connection)
{
//    $mysql_connection->query('SELECT js.setting_value as journal_title, s.context_id as journal_id, aus2.setting_value AS author_first,  aus.setting_value AS author_last, ss.setting_value AS submission_title,
//s.submission_id, js3.setting_value as iThenticateId, js2.setting_value as journal_issn, cpj.only_published, sa.date_assigned, s.date_submitted,
//CASE WHEN EXISTS(SELECT * FROM edit_decisions WHERE decision = 1 AND submission_id = s.submission_id) THEN 1 ELSE 0 END AS IsApproved
//	FROM stage_assignments sa
//	JOIN submissions s ON sa.submission_id = s.submission_id
//	JOIN cees_plagiarism_journals cpj ON cpj.journal_id = s.context_id
//	JOIN authors a ON a.submission_id=s.submission_id
//	JOIN (SELECT DISTINCT author_id, setting_value FROM author_settings WHERE setting_name = \'familyName\') aus ON aus.author_id= a.author_id
//	JOIN (SELECT DISTINCT author_id, setting_value FROM author_settings WHERE setting_name = \'givenName\') aus2 ON aus2.author_id= a.author_id
//	JOIN (SELECT DISTINCT submission_id, setting_value FROM submission_settings WHERE setting_name = \'title\' AND locale = \'en_US\') ss ON ss.submission_id=s.submission_id
//	JOIN (SELECT DISTINCT submission_id, setting_value FROM submission_settings WHERE setting_name = \'title\' AND locale = \'sr_RS@latin\') ss2 ON ss2.submission_id=s.submission_id
//	JOIN (SELECT DISTINCT journal_id, setting_value FROM journal_settings WHERE setting_name = \'name\' and locale=\'sr_RS@latin\') js ON js.journal_id = s.context_id
//	JOIN (SELECT DISTINCT journal_id, setting_value FROM journal_settings WHERE setting_name = \'PrintIssn\') js2 ON js2.journal_id = s.context_id
//	JOIN (SELECT DISTINCT journal_id, setting_value FROM journal_settings WHERE setting_name = \'iThenticateId\') js3 ON js3.journal_id = s.context_id
//	WHERE NOT EXISTS (SELECT * FROM cees_plagiarism_articles_exported WHERE article_id = s.submission_id) and date_assigned > \'2019-10-26 00:00:00\'
//	GROUP BY s.submission_id
//    order by journal_title');

   $mysql_connection->query('SELECT * FROM ceon00_aseestant.plagijarizam2 where date_assigned > \'2019-10-26 00:00:00\';');
  //  $mysql_connection->query('SELECT * FROM ceon00_aseestant.plagijarizam limit 20 offset 150');
    $results = ($mysql_connection->resultset());

    $arr = [];
    foreach ($results as $row) {

        if ($row == null) {
            continue;
        }
        if ($row->only_published == 1 && $row->IsApproved == 0) {
            continue;
        }

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