<?php
/**
 * Echoes (not returns!) the HTML code with all variables
 * It is also the function taking care to fill the array with all current variables
 */
function getTable() {
    global $variableNames;

    echo '<div class="elem header" style="display: none;">';
    echo '	<span class="table_delete">Acci&oacute;n</span>';
    echo '	<span class="table_edit">&nbsp;</span>';
    echo '	<span class="table_name">Nombre</span>';
    echo '	<span class="table_properties">Propiedades</span>';
    echo '</div>';

    $resultwhole = mysql_query("SELECT * FROM khan_variable WHERE variable_question=" . $_GET['question_id']);

    $nonewvar = 0;
    while ($rowwhole = mysql_fetch_array($resultwhole)){


        //Do we have to edit it?
        if ($rowwhole['variable_id'] == $_POST['edit_var_id']) {
            //We do! let's create a form!
            editVariable($rowwhole);
            $nonewvar = 1;
        }elseif ($rowwhole['variable_id'] == $_POST['delete_var_id']){
            deleteVariable($rowwhole['variable_id']);
        } else {

            echo "<div class=\"elem\" style=\"display: none;\">";
            echo '<span class="table_edit">
                <form action="#" method="post"><input type="hidden" name="edit_var_id" value="'.$rowwhole['variable_id'].'"><input type="image" src="./libs/img/edit_icon.png" border="0" ALT="Submit Form"></form>
                </span><span class="table_delete">
                <form action="#" method="post"><input type="hidden" name="delete_var_id" value="'.$rowwhole['variable_id'].'"><input type="image" src="./libs/img/delete.png" border="0" ALT="Submit Form"></form>
                </span>';
            echo '<span class="table_name">' . $rowwhole['variable_name'] . '</span>';
            //Save the name!
            $variableNames[] = $rowwhole['variable_name'];
            echo '<span class="table_properties">' . getProperties($rowwhole['variable_id'], $rowwhole['variable_type']) . '</span>';
            echo "</div>";
        }
    }
    if ($nonewvar == 0) {
        newVariable();
    }
}

/**
 * Searches the corresponding table in the DB for the properties of a specific
 * variable and returns a lovely string
 * @param String $variableId
 * @param String $variableType
 * @return String our beautiful string (eg "Integer from 0 to 7")
 */
function getProperties($variableId, $variableType) {
    global $allVaraibles;
    $query = 'SELECT * FROM khan_variable_' . $variableType . ' WHERE ' . $variableType . '_variable=' . $variableId;
    $resultwhole = mysql_query($query);
    $result = mysql_fetch_array($resultwhole);

    //What kind of number is it?
    if ($variableType == 'integer') {
        return 'N&uacute;mero entero aleatorio (desde ' . $result['integer_min'] . ' hasta ' . $result['integer_max'] . ')';
    } elseif ($variableType == 'float'){

        return 'N&uacute;mero decimal aleatorio (desde ' . $result['float_min'] . ' hasta ' . $result['float_max'] . ') con una raz&oacute;n de &plusmn; ' . $result['float_step'];
    }

}

/**
 * Echoes all the HTML for the creation of a new variable
 */
function newVariable(){
    echo "<div class=\"elem\" style=\"display: none;\">";
    echo '<form action="./libs/insertVariable.php?question_id='.$_GET['question_id'].'" method="post">';
    echo '<span class="table_edit" style="width: 78px;"><input type="image" src="./libs/img/add.png" border="0" ALT="Submit Form"></span>';
    echo '<span class="table_name"><input type="text" name="new_var_name" id="new_var_name" style="width:90px;" required></span>';
    echo '<span class="table_properties">
        N&uacute;mero
        <select name="new_var_type" id="new_var_type" onChange="remove_textbox()">
        <option value="integer">entero</option>
        <option value="float">decimal</option>
        </select>
        aleatorio (desde
        <input type="number" name="new_var_min" id="new_var_min" style="width:50px;" required>
        hasta
        <input type="number" name="new_var_max" id="new_var_max" style="width:50px;" required>
    )<span id="step_string"> con una raz&oacute;n de&plusmn;  
    <input type="number" name="new_var_step" id="new_var_step" style="width:50px;" step="any" >
    </span></span>';
    echo "</form></div>";
}
/**
 * Echoes all the HTML for the edition of a new variable
 */
function editVariable($current){

    $query = 'SELECT * FROM khan_variable_' . $current['variable_type'] . ' WHERE ' . $current['variable_type'] . '_variable=' . $current['variable_id'];
    $resultwhole = mysql_query($query);
    $result = mysql_fetch_array($resultwhole);

    echo "<div class=\"elem\" style=\"display: none;\">";
    echo '<form action="./libs/editVariable.php?question_id='.$_GET['question_id'].'" method="post">';
    echo '<span class="table_edit" style="width: 78px;"><input type="image" src="./libs/img/add.png" border="0" ALT="Submit Form"></span>';
    echo '<span class="table_name"><input type="text" name="new_var_name" value="' . $current['variable_name'] . '" id="new_var_name" style="width:90px;"></span>';
    echo '<span class="table_properties">
        N&uacute;mero ';
    //What kind of number is it?
    if ($current['variable_type'] == 'integer') {
        echo 'entero aleatorio (desde 
            <input type="hidden" name="new_var_type" value="integer">
            <input type="text" name="new_var_min" id="new_var_min" value="' . $result['integer_min'] . '" style="width:30px;">hasta
            <input type="text" name="new_var_max" id="new_var_max" value="' . $result['integer_max'] . '" style="width:30px;">
        ) <span id="step_string">con una raz&oacute;n de
        <input type="text" name="new_var_step" id="new_var_step" style="width:30px;">
        </span> </span>';
    } elseif ($current['variable_type'] == 'float'){
        echo 'decimal aleatorio (desde
            <input type="hidden" name="new_var_type" value="float">
            <input type="text" name="new_var_min" id="new_var_min" value="' . $result['float_min'] . '" style="width:30px;"> hasta
            <input type="text" name="new_var_max" id="new_var_max" value="' . $result['float_max'] . '" style="width:30px;">
        ) <span id="step_string" style="display:inline;">con una raz&oacute;n de
        <input type="text" name="new_var_step" id="new_var_step" value="' . $result['float_step'] . '" style="width:30px;">

        <span> </span>';
    }
    echo '<input type="hidden" name="edit_var_id" value="'.$current['variable_id'].'">';
    echo "</form></div>";
}

function deleteVariable($idToBeDeleted) {
    $query = "DELETE FROM `khan_exercises`.`khan_variable` WHERE `variable_id`='" .$idToBeDeleted. "';";
    $resultwhole = mysql_query($query);
}

function getArrayofVars(){
    $allVariables = array();

    $resultwhole = mysql_query("SELECT * FROM khan_variable WHERE variable_question=" . $_GET['question_id']);
    while ($rowwhole = mysql_fetch_array($resultwhole)){
        $allVariables[$rowwhole['variable_id']]['name'] = $rowwhole['variable_name'];
        $allVariables[$rowwhole['variable_id']]['type'] = $rowwhole['variable_type'];
    }
    foreach ($allVariables as $id => $properties){
        $query = 'SELECT * FROM khan_variable_' . $properties['type'] . ' WHERE ' . $properties['type'] . '_variable=' . $id;
        $super_String .= "\n" . $query ."\n";
        $resultwhole = mysql_query($query);
        $result = mysql_fetch_array($resultwhole);
        //What kind of number is it?
        if ($properties['type'] == 'integer') {
            $allVariables[$id]['min'] = $result['integer_min'];
            $allVariables[$id]['max'] = $result['integer_max'];
            $allVariables[$id]['step'] = 0;
        } elseif ($rowwhole['variable_type'] == 'float'){
            $allVariables[$id]['min'] = $result['integer_min'];
            $allVariables[$id]['max'] = $result['integer_max'];
            $allVariables[$id]['step'] = $result['float_step'];
        }
    }
    return $allVariables;
}

?>
