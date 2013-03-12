<h1 class="typeOfPage">Fill in the blank</h1>
<div id="tabs">
    <ul>
        <li><a href="#tabs-1">Ejercicio</a></li>
        <li><a href="#tabs-2">Visualización previa</a></li>
        <li><a href="#tabs-3">HTML</a></li>
    </ul>
    <div id="tabs-1">

        <h2>Crea un ejercicio</h2>
        <p>Aqui podrás crear un ejercicio nuevo de Khan.</p>

        <div class="list">
<?php $open_tabs = explode("_", $_COOKIE['open_tabs']);
?>
            <!-- ---------------------- VARIABLES ---------------------- -->
            <div class="course-wrapper">
            <div class="course">
                    <span class="toggle more"></span> <span class="title">Variables</span>
                </div>
<?php 
include 'libs/variable_controls.php';
$vars = getArrayofVars();
getTable();
?>
            </div>

            <!-- ---------------------- TITLE ---------------------- -->
            <form action=<?php echo '"libs/autosave/autosave_work.php?question_id='.$_GET['question_id'].'"'; ?> method="post" onsubmit="tinyMCE.triggerSave(false, true);">
                <div class="course-wrapper">
                <div class="course">
                        <span class="toggle more"></span> <span class="title">Título</span>
                    </div>
                    <div class="elem">
<?php
$result = mysql_query("SELECT * FROM khan_question WHERE question_id = " . $_SESSION['question_id']);
$row = mysql_fetch_array($result);

?>

                        <textarea rows="3" cols="98" name="title" id="title"><?php echo $row['question_title'] ?></textarea>
                        <button type="submit">Guardar Titulo</button>
                        <div id="database"></div>
                        <div id="message">
                            <p></p>
                        </div>
                        <p id="return"></p>

                    </div>

                </div>

                <!-- ---------------------- STATEMENT ---------------------- -->
                <div class="course-wrapper">
                    <div class="course">
                        <span class="toggle more"></span> <span class="title">Enunciado</span>
                    </div>
                    <div class="elem">
                        <textarea class="tinymce" rows="3" cols="98" name="statement" id="statement" style="display: inline;"><?php echo $row['question_statement'];?></textarea>
                    </div>

                </div>

                <!-- ---------------------- SOLUTION ---------------------- -->
                <div class="course-wrapper">
                    <div class="course">
                        <span class="toggle more"></span> <span class="title">Solución</span>
                    </div>
                    <div class="elem">
                        <textarea class="tinymce_solution" rows="3" cols="98" name="solution" id="solution"><?php echo $row['question_solution'];?></textarea>
                    </div>

                </div>
            </form>
            <!-- ---------------------- HINTS ---------------------- -->
            <div class="course-wrapper">
                <div class="course">
                    <span class="toggle more"></span> <span class="title">Pistas</span>
                </div>
<?php 
include 'libs/hint_controls.php';
getHintTable();
?>

            </div>
        </div>







    </div>
    <!-- End of tab1 (exercise creation) -->
    <div id="tabs-2">
        <iframe id="ifr" src="http://163.117.69.19:8000/exercises/aa.html" height="700" width="850" seamless></iframe>			

    </div>
    <!-- End of tab2 (exercise preview) -->
    <div id="tabs-3">
        <p>Este es el codigo XML del ejercicio de Khan, probablemente no te sirva de mucho</p>
        <?php include("./libs/parser.php");?>
        <textarea cols="98" rows="40"><?php process_and_parse(); ?></textarea>
    </div>
    <!-- End of tab3 (exercise code) -->
</div>
<?php include("./libs/tinymceinits.php");?>
