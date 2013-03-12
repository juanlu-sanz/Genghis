<?php

include('../configs.php');
$con = mysql_connect(DB_HOST, DB_USER, DB_PASS);

if (!$con) {
    die('Could not connect: ' . mysql_error());
}
/*----- Query -----*/
$query = "DELETE FROM `khan_exercises`.`khan_question` WHERE `question_id`='".$_POST['question_id']."';";

//echo $query;

/*----- Let's talf DB -----*/
mysql_select_db("khan_exercises", $con);
mysql_query($query);

//echo "<br/>Last inserted ID -->" . mysql_insert_id();


header('Location: '.URL);
