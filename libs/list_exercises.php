
<?php 
function getExerciseTable(){
    /*echo '<div class="elem header" style="display: none;">';
    echo '	<span class="table_delete">Acci&oacuten</span>';
    echo '	<span class="table_edit">&nbsp;</span>';
    echo '	<span class="table_name">Numero</span>';
    echo '	<span class="table_properties">Texto</span>';
    echo '</div>';
     */
    $query = "SELECT 
        elearning.khan_exercise.exercise_id,
        elearning.khan_exercise.exercise_author,
        elearning.khan_exercise.exercise_department,
        elearning.khan_question.question_id,
        elearning.khan_question.question_title
        FROM elearning.khan_question
        INNER JOIN elearning.khan_exercise
        ON elearning.khan_question.question_exercise = elearning.khan_exercise.exercise_id
        WHERE elearning.khan_exercise.exercise_id = 1;";
    $exercise_list = mysql_query($query);



    if (empty($exercise_list)) {
        echo "No hay ejercicios, ¡crea uno!";
        //newhint();
    } else {
        //It doesn't seem to be empty, let's iterate all exercises.
        while ($current_exercise = mysql_fetch_array($exercise_list)){
            if ($current_exercise['question_id'] == $_POST['delete_exercise_id']){
                //deletehint($current_exercise[0]);
            } else {
                echo "<div class=\"elem\" style=\"display: none;\">";
                echo '<span class="table_edit">
                    <form action="http://www.gast.it.uc3m.es/~jusanzm/" method="post">
                    <input type="hidden" id="question_id" name="question_id" value="'.$current_exercise['question_id'].'">
                    <input type="image" src="./libs/img/edit_icon.png" border="0" ALT="Submit Form">
                    </form>

                    </span>
                    <span class="table_delete">
                    <form action="#" method="post">
                    <input type="hidden" name="delete_exercise_id" value="'.$current_exercise['question_id'].'">
                    <input type="image" src="http://163.117.152.240/elearning/images/actions/delete.png" border="0" ALT="Submit Form">
                    </form>
                    </span>';
                echo '<span class="table_name">' . $current_exercise['question_title'] . '</span>';
                //Save the name!
                echo '<span class="table_properties">' . $hint[1] . '</span>';
                echo "</div>";
                $or = $or+1;
            }
        }
    }

}
