<h2>Panel de control de administrador</h2>
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
<p>Bienvenido admin, aqui podras descargar todos los archivos como zip</p>
<form action="libs/downloadZip.php">
	<input type="submit" value="Descargar todo" />
</form>
