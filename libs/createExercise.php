<?php 
if(session_id() == '') {
	session_start();
}
//$_REQUEST["user"] = "0a9b8005-8590-11e2-8670-005056933c20";

$debug = 0;

try {
	require_once("./sdic_api_client_elearning.class.php");
	$api = new SDICApiClientELearning();

	$api->assignKey("18908eee-90a1-11e2-a8a5-005056933b24");
} catch (Exception $e) {
	echo "Exception: ".$e->getMessage();
}
$user = $api->getUser($_COOKIE["user"]);
//$courses = $api->getCourses(NULL, $user->results->uid);
$course = $_GET['course'];

include('../configs.php');

$con = mysql_connect(DB_HOST, DB_USER, DB_PASS);

if (!$con) {
	die('Could not connect: ' . mysql_error());
}
/*----- Query -----*/
$query = "INSERT INTO
		`khan_exercises`.`khan_question`
		(`question_author`, `question_course`)
		VALUES
		('".$_COOKIE['user']."', '".$course."');";
if ($debug) {
	echo $query;
	echo "<br/>Last inserted ID -->" . mysql_insert_id();
} else {
	mysql_select_db("khan_exercises", $con);
	mysql_query($query);	
	header('Location: '.URL.'?question_id='.mysql_insert_id());
}
