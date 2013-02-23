
<?php 
include './configs.php';
try {
    require_once("./libs/sdic_api_client_elearning.class.php");
    $api = new SDICApiClientELearning();
    $api->assignKey(DEVELOPER_KEY);
} catch (Exception $e) {
    echo "Exception: ".$e->getMessage();
}

//DEBUGGING; WILL BE REMOVED
$department_id = 'I126';
$department_key = 0;

//Get user data
//$user_key = $_REQUEST[“user”];
$user_key = "5f33b663-5593-11e2-b937-20cf301bb10e";
$user = $api->getUser($user_key);
/*echo "<pre>";
print_r($user);
echo "</pre>";*/

//$courses = $api->getCourses(1);
$courses = $api->getDepartments()->results;
foreach ($courses as $key => $properties){
    if($properties->id == $department_id) {
        $department_key = $key;
    }
}
/*
echo '<pre>';
print_r($courses[$department_key]);
echo '</pre>';
 */
?>


<h2>Listado de ejercicios</h2>
<p>Hola <?php echo ucwords(strtolower($user->results->cn));?>, esta es la p&aacute;gina donde se listan todos los ejercicios ya creados por departamento y las opciones disponibles.</p>

<div class="list">
    <!-- ---------------------- LIST EXERCISES ---------------------- -->
    <div class="course-wrapper">
        <div class="course">
            <span class="toggle more"></span> <span class="title">Ejercicios de tu grupo</span>
        </div>
        <div class="elem header" style="display: none;">
            <span class="table_delete">Acción</span>
            <span class="table_edit">&nbsp;</span>
            <span class="table_name">Título del ejercicio</span>
</div>
<!--        <div class="elem">TEST</div>-->
<?php
include('libs/list_exercises.php');
getExerciseTable();
?>
    </div>
    <!-- End of courses -->
</div>
<!-- End of list -->
