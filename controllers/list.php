<h2>Listado de ejercicios</h2>
<p>
	Hola
	<?php echo ucwords(mb_strtolower(str_replace("&Ntilde;", "&ntilde;", $user->results->cn), 'UTF-8'));?>
	, esta es la p&aacute;gina donde se listan todos los ejercicios ya creados por departamento y las opciones disponibles.
</p>

<?php 
try {
	$api = new SDICApiClientELearning();
	$api->assignKey("18908eee-90a1-11e2-a8a5-005056933b24");
} catch (Exception $e) {
    echo "Exception: ".$e->getMessage();
}
$user = $api->getUser($_COOKIE["user"]);
$courses = $api->getCourses(15, $user->results->uid);

?>


<div class="list">
	<!-- ---------------------- LIST EXERCISES ---------------------- -->

	<?php
	include('libs/list_exercises.php');
	getExerciseTable();
	?>

	<!-- End of courses -->
	<script>
$(function() {
    document.getElementById('openSesame').click();
});
</script>
</div>
<!-- End of list -->
