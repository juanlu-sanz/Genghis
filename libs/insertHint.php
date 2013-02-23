<?php 
session_start();
include('../configs.php');
$con = mysql_connect(DB_HOST, DB_USER, DB_PASS);

if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
//INSERT INTO `elearning`.`khan_variable` (`variable_question`, `variable_name`, `variable_type`) VALUES ('1', 'asdf', 'float');
$new_order = $_POST['hint_order']+1;
mysql_select_db("elearning", $con);
if (isset($_POST['hint_id'])) {
	$qstring='UPDATE `elearning`.`khan_hint` SET `hint_question`=\''. $_SESSION['question_id'] .'\', `hint_text`=\''. $_POST['new_hint_text'] .'\', `hint_order`=\''. $_POST['hint_order'] .'\' WHERE `hint_id`=\''.$_POST['hint_id'].'\'';
} else {
	$qstring = 'INSERT INTO `khan_hint` (`hint_question`, `hint_text`, `hint_order`) VALUES ('. $_SESSION['question_id'] .', \''. $_POST['new_hint_text'] .'\', '. $new_order .');';
}
mysql_query($qstring);

header('Location: '.URL);