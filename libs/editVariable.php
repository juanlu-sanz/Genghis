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
//INSERT INTO `khan_exercises`.`khan_variable` (`variable_question`, `variable_name`, `variable_type`) VALUES ('1', 'asdf', 'float');

mysql_select_db("khan_exercises", $con);

$qstring = "UPDATE `khan_variable` SET 
    `variable_question` = " . $_GET['question_id'] . " , 
    `variable_name` = '" . $_POST['new_var_name'] . "' ,
    `variable_type` = '" . $_POST['new_var_type'] . "' 
    WHERE variable_id ='" . $_POST['edit_var_id'] . "';";
//echo $qstring;
mysql_query($qstring);
//Find float/integer table and insert properties
if ($_POST['new_var_type']=='float'){
    $qstring = "UPDATE `khan_variable_float` SET
        `float_min` = '" . $_POST['new_var_min'] . "' ,
        `float_max` = '" . $_POST['new_var_max'] . "' ,
        `float_step` = '" . $_POST['new_var_step'] . "'
        WHERE float_variable ='" . $_POST['edit_var_id'] . "';";

} else {

    $qstring = "UPDATE `khan_variable_integer` SET
        `integer_min` = '" . $_POST['new_var_min'] . "' ,
        `integer_max` = '" . $_POST['new_var_max'] . "'
        WHERE integer_variable ='" . $_POST['edit_var_id'] . "';";

}
//echo '<br/>';
//echo $qstring;
mysql_query($qstring);
//echo '<br />Last string is '.mysql_insert_id()
header('Location: '.URL.'?question_id='.$_GET['question_id']);
