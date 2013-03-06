
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

        $api->assignKey("ba4f86ea-8592-11e2-8670-005056933c20");
    } catch (Exception $e) {
        echo "Exception: ".$e->getMessage();
    }
    $user = $api->getUser($_COOKIE["user"]);
    
    $query = "SELECT 
        khan_exercises.khan_question.question_id,
        khan_exercises.khan_question.question_author,
        khan_exercises.khan_question.question_title
        FROM
        khan_exercises.khan_question
        WHERE
        khan_exercises.khan_question.question_author = '".$user->results->uid."';";
    $exercise_list = mysql_query($query);



    if (empty($exercise_list)) {
        echo "No hay ejercicios, ¡crea uno!";
        newExercise();
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
                echo '<span class="table_properties">' . $hint[1] . '</span>';
                echo "</div>";
                $or = $or+1;
            }
        }
        newExercise();
    }

}

function newExercise(){
    echo "<div class=\"elem\" style=\"display: none;\">";
    echo '<form action="./libs/createExercise.php" method="post">';
    echo '<span class="table_properties">';
    echo '<input type="submit" value="Nuevo Ejercicio">';
    echo '</span>';
    echo "</form></div>";


}



















