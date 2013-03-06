<h2>Listado de ejercicios</h2>
<p>Hola <?php echo ucwords(strtolower($user->results->cn));?>, esta es la p&aacute;gina donde se listan todos los ejercicios ya creados por departamento y las opciones disponibles.</p>

<?php 
try {
    $api = new SDICApiClientELearning();
    $api->assignKey("ba4f86ea-8592-11e2-8670-005056933c20");
} catch (Exception $e) {
    echo "Exception: ".$e->getMessage();
}
$user = $api->getUser($_COOKIE["user"]);
$courses = $api->getCourses(18, $user->results->uid);

?>


<div class="list">
    <!-- ---------------------- LIST EXERCISES ---------------------- -->
    <div class="course-wrapper">
        <div class="course" id="openSesame"> 
        <span class="toggle more"></span> <span class="title"><?php echo $courses->results[0]->name; ?></span>
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
<script>
$(function() {
    document.getElementById('openSesame').click();
});
</script>
</div>
<!-- End of list -->
