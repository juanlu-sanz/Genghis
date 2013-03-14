<?php

include("ParensParser.php");

function parse_mathjax_to_js($string) {
    if (strrpos($string, '<span class="AM">')){
        $location = strrpos($string, "<span class=\"AM\">`");

        $start_of_latex = $location + 18;
        $end_of_latex = strrpos($string, "`</span>");
        $latex_len = $end_of_latex - $start_of_latex;

        $actual_code_ML = substr ($string, $start_of_latex, $latex_len );
    }else{
        $actual_code_ML = $string;
    }
    $p = new ParensParser();
    $array_result = $p->parse($actual_code_ML);
    return recursive_parsing($array_result);
}

function recursive_parsing($arrays) {
    //----------------------------------------------- GET VARIABLES -----------------------------------------------

    $allVariables = array();

    $resultwhole = mysql_query("SELECT * FROM khan_variable WHERE variable_question=" . $_SESSION['question_id']);
    while ($rowwhole = mysql_fetch_array($resultwhole)){
        $allVariables[$rowwhole['variable_id']] = $rowwhole['variable_name'];
    }
    $final_string="";
    $power = 0;
    foreach ($arrays as $index => $piece){
        if (!is_array($piece)) {
            if ($piece[strlen($piece)-1] == '^'){
                $trimmed = substr_replace($piece ,"",-1);
                $final_string .= "pow(". $trimmed . "," . recursive_parsing($arrays[$index+1]) .")";
                $power=1;
            } elseif ($piece === "pi"){
                $final_string .= "Math.PI";
            } elseif ($piece[0] == '['){
                $piece = substr($piece, 0 , -1);
                $piece = substr($piece, 1);
                if (in_array($piece, $allVariables )) {
                    // $final_string .= "<var>".$piece."</var>";
                    $final_string .=$piece;
                }

            }else {
                $final_string .= $piece;
            }
        } else {
            if ($power){
                $power = 0;
            } else {
                $final_string .= '(' . recursive_parsing($piece) . ')';
            }
        }

    }
    return $final_string;
}

function parse_latex_and_solution($input_string) {
    $final_string = $input_string;
    while (strrpos($final_string, "<img src=\"http://latex.codecogs.com/gif.latex?")){

        $location = strrpos($final_string, "<img src=\"http://latex.codecogs.com/gif.latex?");

        $start_of_latex = strrpos($final_string, "\" alt=\"")+7;
        $end_of_latex = strrpos($final_string, "\" align=\"absmiddle\" />");
        $latex_len = $end_of_latex - $start_of_latex;

        $final_string = substr_replace($final_string, "</code>", $end_of_latex, strlen("\" align=\"absmiddle\" />"));
        $final_string = substr_replace($final_string, "<code>", $location, $start_of_latex - $location);


    }

    return $final_string;
}

function find_and_parse_latex($input_string) {
    require_once './libs/ASCIIMath2TeX.php';
    $AMT = new AMtoTeX;
    //$tex = $AMT->convert($AMstring); //convert ASCIIMath string to TeX
    $final_string = $input_string;
    while (strrpos($final_string, "<span class=\"AM\">`")){

        $location = strrpos($final_string, "<span class=\"AM\">`");

        $start_of_latex = $location + 18;
        $end_of_latex = strrpos($final_string, "`</span>");
        $latex_len = $end_of_latex - $start_of_latex;

        $actual_code_ML = substr ($final_string, $start_of_latex, $latex_len );
        $actual_code_TeX = $AMT->convert($actual_code_ML);

        $str = "<code>".$actual_code_TeX."</code>";

        $final_string = substr_replace($final_string, $str, $location, 18+$latex_len+8 );
        //$final_string = substr_replace($final_string, "<code>", $location, $start_of_latex - $location);

        //$final_string =

    }

    return $final_string;
}

function process_and_parse(){
    //----------------------------------------------- GET VARIABLES -----------------------------------------------

    $allVariables = array();

    $resultwhole = mysql_query("SELECT * FROM khan_variable WHERE variable_question=" . $_SESSION['question_id']);
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
    //----------------------------------------------- GET HINTS -----------------------------------------------

    $allHints = array();

    $resultwhole = mysql_query("SELECT * FROM khan_hint WHERE hint_question=" . $_SESSION['question_id']);
    while ($rowwhole = mysql_fetch_array($resultwhole)){
        $allHints[$rowwhole['hint_id']]['text'] = $rowwhole['hint_text'];
        $allHints[$rowwhole['hint_id']]['order'] = $rowwhole['hint_order'];
    }

    //----------------------------------------------- TEXT -----------------------------------------------
    $result = mysql_query("SELECT * FROM khan_question WHERE question_id = " . $_SESSION['question_id']);
    $row = mysql_fetch_array($result);
    $title = $row['question_title'];
    $statement = $row['question_statement'];
    $solution = $row['question_solution'];
    $error = $row['question_error'];
    $round = $row['question_round'];
    $trimmedSolution = str_replace('<p>', "", $solution);
    $trimmedSolution = str_replace('</p>', "", $trimmedSolution);
    $trimmedSolution = " " . $trimmedSolution;  
    $check = $row['question_check'];

    //----------------------------------------------- STRINGS -----------------------------------------------
    $requires_code = "<!DOCTYPE html>\n<html data-require=\"";
    $title_code = "\">\n<head>\n\t<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n\t<title>";
    $vars_code = "</title>\n\t<script src=\"../khan-exercise.js\"></script>\n</head>\n<body>\n\t<div class=\"exercise\">\n\t<div class=\"vars\"";
    $close_vars_code = "\">";
    $var_id_code = "\t<var id=\"";
    $end_var_code = "</var>\n\t";

    $problem_code = "</div>\n\n\t<div class=\"problems\">\n\t\t<div>\n\t\t\t<div class=\"problem\">\n\t\t\t\t";
    $question_code = "\n\t\t\t</div>\n\t\t\t<div class=\"question\">\n\t\t\t\t<p>";
    $solution_code1 = "</p>\n\t\t\t</div>\n\t\t\t<div class=\"solution\" data-type=\"decimal\">";
    $solution_code12 = "</p>\n\t\t\t</div>\n\t\t\t<div class=\"solution\" data-inexact data-max-error=\"";
    /*	$question_code = "</p>\n\t\t\t</div>\n\t\t\t<div class=\"question\">\n\t\t\t\t<p>";
     $solution_code1 = "</p>\n\t\t\t</div>\n\t\t\t<div class=\"solution\" data-type=\"decimal\">";
    $solution_code12 = "</p>\n\t\t\t</div>\n\t\t\t<div class=\"solution\" data-inexact data-max-error=\"";*/
    $solution_code2 = "\" data-type=\"decimal\">";
    $hints_code = "</div>\n\t\t</div>\n\t</div>\n\n\t<div class=\"hints\">\n";

    $end_hints_and_file_code = "\t</div>\n\t</div>\n</body>\n</html>\n";

    $no_var_comment = "\t<!-- There are no variables! -->\n\t";
    $no_hint_comment = "\t\t<!-- There are no hints! -->\n";

    //----------------------------------------------- PRINTING -----------------------------------------------

    $super_String = $requires_code."math"." word-problems".$title_code.$title.$vars_code.">\n\t";
    // VARIABLES
    if(!empty($allVariables)){
        foreach ($allVariables as $id => $properties){
            if ($properties['step'] != 0) {
                $super_String = $super_String . $var_id_code.$properties['name'].$close_vars_code."roundTo(".$properties['step'].", randRange(".$properties['min'].", ".$properties['max']."))".$end_var_code;
            } else {
                $super_String = $super_String . $var_id_code.$properties['name'].$close_vars_code."randRange(".$properties['min'].", ".$properties['max'].")".$end_var_code;
            }
        }
    } else {
        $super_String = $super_String . $no_var_comment;
    }

    $super_String = $super_String . $problem_code.find_and_parse_latex($statement);
    //-------------------------------SOLUTION_CHECKER--------------------
    if ($check) {
        if ($round) {
            $super_String = $super_String .'<b>Solución aceptada: </b><var>roundTo('.$round.','.parse_mathjax_to_js($trimmedSolution).')</var>';
        } else {
            $super_String = $super_String .'<b>Solución aceptada: </b><var>'.parse_mathjax_to_js($trimmedSolution).'</var>';
        }
    }
    //-------------------------------solution------------


    $super_String .= $question_code.find_and_parse_latex($_SESSION['text_session']);
    if ($error) {
        if ($round) {
            $super_String = $super_String . $solution_code12 . $error .$solution_code2.'<var>roundTo('.$round.','.parse_mathjax_to_js($trimmedSolution).')</var>'.$hints_code;
        } else {
            $super_String = $super_String . $solution_code12 . $error .$solution_code2.'<var>'.parse_mathjax_to_js($trimmedSolution).'</var>'.$hints_code;
        }
    } else {
        if ($round){
            $super_String = $super_String . $solution_code1.'<var>roundTo('.$round.',' .parse_mathjax_to_js($trimmedSolution).')</var>'.$hints_code;
        } else {
            $super_String = $super_String . $solution_code1.'<var>' .parse_mathjax_to_js($trimmedSolution).'</var>'.$hints_code;
        }
    }

    if(!empty($allHints)){
        foreach ($allHints as $hintId => $hintProperties){
            $super_String = $super_String .  "\t\t<div>".$hintProperties['text']."</div>\n";
        }
    } else{
        $super_String = $super_String .  $no_hint_comment;
    }


    $super_String = $super_String .  $end_hints_and_file_code;
    echo $super_String;
/*    $success = chmod("./Khan-exercises/exercises/aa.html", 0755);
    if (!$success) {
        echo "Can't change permissions!";
    }
 */
    $fh = fopen("./khan-exercises/exercises/aa.html", 'w') or exit("Unable to open file!");
    fwrite($fh, $super_String);
    fclose($fh);
}






?>
