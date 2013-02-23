<?php 
if(session_id() == '') {
	session_start();
}
include('../configs.php');
$con = mysql_connect(DB_HOST, DB_USER, DB_PASS);

if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
//INSERT INTO `elearning`.`khan_variable` (`variable_question`, `variable_name`, `variable_type`) VALUES ('1', 'asdf', 'float');

mysql_select_db("elearning", $con);
$qstring = 'INSERT INTO `khan_variable` 
		(`variable_question`, `variable_name`, `variable_type`) VALUES 
		('. $_SESSION['question_id'] .', \''. $_POST['new_var_name'] .'\', \''. $_POST['new_var_type'] .'\');';
mysql_query($qstring);

//Find float/integer table and insert properties
if ($_POST['new_var_type']=='float'){
	$qstring = 'INSERT INTO `elearning`.`khan_variable_float`
			(`float_variable`, `float_min`, `float_max`, `float_step`) VALUES
			('.mysql_insert_id().', '.$_POST['new_var_min'].', '.$_POST['new_var_max'].', '.$_POST['new_var_step'].');';
} else {
	$qstring = 'INSERT INTO `elearning`.`khan_variable_integer` 
			(`integer_variable`, `integer_min`, `integer_max`) VALUES 
			('.mysql_insert_id().', '.$_POST['new_var_min'].', '.$_POST['new_var_max'].');';
}
mysql_query($qstring);
//echo '<br />Last string is '.mysql_insert_id();
header('Location: '.URL);