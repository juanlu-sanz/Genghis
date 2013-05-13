
<?php 
function getExerciseTable(){
	/*echo '<div class="elem header" style="display: none;">';
	 echo '	<span class="table_delete">Acci&oacuten</span>';
	echo '	<span class="table_edit">&nbsp;</span>';
	echo '	<span class="table_name">Numero</span>';
	echo '	<span class="table_properties">Texto</span>';
	echo '</div>';
	*/

	try {
		//require_once("./sdic_api_client_elearning.class.php");
		$api = new SDICApiClientELearning();

		$api->assignKey("18908eee-90a1-11e2-a8a5-005056933b24");
	} catch (Exception $e) {
		echo "Exception: ".$e->getMessage();
	}
	$user = $api->getUser($_COOKIE["user"]);
	$courses = $api->getCourses(NULL, $user->results->uid);

	foreach ($courses->results as $key => $course) {
		echo '<div class="course-wrapper">
				<div class="course" id="openSesame">
				<span class="toggle more"></span> <span class="title">' . $course->name . '</span>
				</div>
				<div class="elem header" style="display: none;">
				<span class="table_delete">Acción</span>
				<span class="table_edit">&nbsp;</span>
				<span class="table_name">Título del ejercicio</span>
				</div>';
		$query = "SELECT
				khan_exercises.khan_question.question_id,
				khan_exercises.khan_question.question_author,
				khan_exercises.khan_question.question_title
				FROM
				khan_exercises.khan_question
				WHERE
				khan_exercises.khan_question.question_course = '".$course->id."';";
		$exercise_list = mysql_query($query);



		if (empty($exercise_list)) {
			echo "No hay ejercicios, ¡crea uno!";
			newExercise($course->id);
		} else {
			//It doesn't seem to be empty, let's iterate all exercises.
			while ($current_exercise = mysql_fetch_array($exercise_list)){
				if ($current_exercise['question_id'] == $_POST['delete_exercise_id']){
					//deletehint($current_exercise[0]);
				} else {
					echo "<div class=\"elem\" style=\"display: none;\">";
					echo '<span class="table_edit">
							<form action="'.URL.'" method="get">
									<input type="hidden" id="question_id" name="question_id" value="'.$current_exercise['question_id'].'">
											<input type="image" src="./libs/img/edit_icon.png" border="0" ALT="Submit Form">
											</form>
											</span>

											<span class="table_delete">
											<form action="./libs/delete_exercises.php" method="post">
											<input type="hidden" name="question_id" value="'.$current_exercise['question_id'].'">
													<input type="image" src="./libs/img/delete.png" border="0" ALT="Submit Form">
													</form>
													</span>';
					echo '<span class="table_name">' . $current_exercise['question_title'] . '</span>';
					//Save the name!
					$userLocal = $api->getUser($current_exercise['question_author']);
					echo '<span class="table_author">' . ucwords(mb_strtolower(str_replace("&Ntilde;", "&ntilde;", $userLocal->results->cn), 'UTF-8')) . '</span>';
					echo "</div>";
					$or = $or+1;
				}
			}
			newExercise($course->id);
		}
	}

	echo '</div>';


}

function newExercise($course){
	echo "<div class=\"elem\" style=\"display: none;\">";
	echo '<form action="./libs/createExercise.php?course=' . $course . '" method="post">';
	echo '<span class="table_name">';
	echo '<input type="submit" value="Nuevo Ejercicio">';
	echo '</span>';
	echo "</form></div>";


}



















