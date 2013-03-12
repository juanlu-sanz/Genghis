<?php
$hintNames = array();
/**
 * Echoes (not returns!) the HTML code with all hints
 * It is also the function taking care to fill the array with all current hints
 */
function getHintTable() {
    global $hintNames;
    echo '<div class="elem header" style="display: none;">';
    echo '	<span class="table_delete">Acci&oacuten</span>';
    echo '	<span class="table_edit">&nbsp;</span>';
    echo '	<span class="table_name">Numero</span>';
    echo '	<span class="table_properties">Texto</span>';
    echo '</div>';

    $resultwhole = mysql_query("SELECT * FROM khan_hint WHERE hint_question=" . $_GET['question_id']);

    while ($rowwhole = mysql_fetch_array($resultwhole)){
        //Do we have to edit it?

        $hints[$rowwhole['hint_order']]=array($rowwhole['hint_id'], $rowwhole['hint_text']);

    }
    if (empty($hints)) {
        newhint();
    } else {
        ksort($hints);
        $or = 1;
        $nonewhint = 0;
        foreach ($hints as $hint_order => $hint){
            if ($hint[0] == $_POST['edit_hint_id']) {
                //We do! let's create a form!
                edithint($hint_order, $hint[0], $hint[1]);
                $nonewhint = 1;
            }elseif ($hint[0] == $_POST['delete_var_id']){
                deletehint($hint[0]);
            } else {
                echo "<div class=\"elem\" style=\"display: none;\">";
                echo '<span class="table_edit">
                    <form action="#" method="post">
                    <input type="hidden" name="edit_hint_id" value="'.$hint[0].'">
                    <input type="image" src="./libs/img/edit_icon.png" border="0" ALT="Submit Form">
                    </form>
                    </span><span class="table_delete">
                    <form action="#" method="post">
                    <input type="hidden" name="delete_var_id" value="'.$hint[0].'">
                    <input type="image" src="./libs/img/delete.png" border="0" ALT="Submit Form">
                    </form>
                    </span>';
                echo '<span class="table_name">' . $or . '</span>';
                //Save the name!
                $hintNames[] = $hint_order;
                echo '<span class="table_properties">' . $hint[1] . '</span>';
                echo "</div>";
                $or = $or+1;
            }
        }

        if (!$nonewhint) {newhint();}

    }
}

/**
 * Echoes all the HTML for the creation of a new hint
 */
function newhint(){
    global $hintNames;
    if(empty($hintNames)){
        $order = 1;
    } else {
        $order = max($hintNames);
    }
    echo "<div class=\"elem\" style=\"display: none;\">";
    echo '<form action="./libs/insertHint.php?question_id='.$_GET['question_id'].'" method="post">';
    echo '<span class="table_edit" style="width: 78px;"><input type="image" src="./libs/img/add.png" border="0" ALT="Submit Form"></span>';
    echo '<span class="table_properties">';
    echo '<textarea class="tinymce" rows="3" cols="80" name="new_hint_text" id="new_hint_text"></textarea>';
    echo '<input type="hidden" name="hint_order" value="'.$order.'">';
    echo '</span>';
    echo "</form></div>";
}
/**
 * Echoes all the HTML for the edition of a new hint
 */
function edithint($order, $id, $text){
    echo "<div class=\"elem\" style=\"display: none;\">";
    echo '<form action="./libs/insertHint.php?question_id='.$_GET['question_id'].'" method="post">';
    echo '<span class="table_edit" style="width: 78px;"><input type="image" src="./libs/img/add.png" border="0" ALT="Submit Form"></span>';
    echo '<span class="table_properties">
        <textarea class="tinymce" rows="3" cols="80" name="new_hint_text" id="new_hint_text">'.$text.'</textarea>
        <input type="hidden" name="hint_order" value="'.$order.'">
        <input type="hidden" name="hint_id" value="'.$id.'">

        </span>';
    echo "</form></div>";
}

function deletehint($idToBeDeleted) {
    $query = "DELETE FROM `khan_exercises`.`khan_hint` WHERE `hint_id`='" .$idToBeDeleted. "';";
    $resultwhole = mysql_query($query);
}
?>
