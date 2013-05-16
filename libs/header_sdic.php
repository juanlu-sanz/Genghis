<!--
	CODIGO SERVICIO DE INFORMÁTICA Y COMUNICACIÓN
	Navegación interna plataforma GEL para la vista de la lista de ejercicios
-->

<?php

	// Cambiar por la ruta donde este la libreria
	require_once("sdic_api_client_elearning.class.php");

	$sdic_client = new SDICApiClientELearning();
	$sdic_client->assignKey("1aa1b960-7a83-11e2-a8a5-005056933b24");

	$user_info = $sdic_client->getUser($_COOKIE["user"]);

	$BASE_URL = "https://baal.uc3m.es/gel";

?>

<!-- META -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></meta>

<!-- HOJAS DE ESTILO -->
<!-- <link rel="stylesheet" href="<?=$BASE_URL?>/styles/puvikhan.css" type="text/css" media="screen"></link>		
<link rel="stylesheet" href="<?=$BASE_URL?>/styles/open-sans-fontfacekit/stylesheet.css" type="text/css" media="screen"></link>
-->

<div id="auth-info">
	 <div class="details">
	 	<?php if ($user_info->results->role == "admin"):?>
	 		<a href="<?=$BASE_URL?>/?class=admin"><img src="<?=$BASE_URL?>/images/auth-info/change-view.png" class="icon cursor-pointer" alt="Cambiar perfil" title="Cambiar perfil"> Panel de administración</a>		 	
		<?php endif;?>
	</div>
	¡Bienvenido, <?= ucwords(strtolower($user_info->results->cn))?>! 
	<a href="<?=$BASE_URL?>/logout.php"><img src="<?=$BASE_URL?>/images/auth-info/logout.png" class="icon cursor-pointer" alt="Salir" title="Salir"></a
>
</div>

<br clear="both">

<ul class="breadcrumb">
	<li class="parent"><a href="https://baal.uc3m.es/gel/?class=user&action=platformMenu&id=15"><img src="https://baal.uc3m.es/gel/images/platforms/Khan Academy_small.png" class="icon"> Khan Academy</a></li>
	<li class="separator"> > </li>
	<li class="title"><img src="https://baal.uc3m.es/gel/images/user-breadcrumb/admin-videos.png" class="icon"> Mis ejercicios</li>	
</ul>
