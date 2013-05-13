<h1 class="typeOfPage">Fill in the blank</h1>
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Ejercicio</a></li>
		<li><a href="#tabs-2">Visualización previa</a></li>
		<li><a href="#tabs-3">HTML</a></li>
	</ul>
	<div id="tabs-1">

		<h2>Crea un ejercicio</h2>
		<div class="button_return">
			<form action=<?php echo '"'.URL_GEL.'"'; ?>>
				<button type="submit">Volver a Ejercicios</button>
				<p class="warning">¡Asegurate de haber guardado antes!</p>
			</form>
		</div>

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
			<form action=<?php echo '"libs/autosave/autosave_work.php?question_id='.$_GET['question_id'].'"'; ?> method="post"
				onsubmit="tinyMCE.triggerSave(false, true);">
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
						<span class="table_properties">Nota: ¡Es importante que la solución esté siempre entre las comillas!</span>
					</div>
					<div class="elem">
						<textarea class="tinymce_solution" rows="3" cols="98" name="solution" id="solution"><?php if($row['question_solution']){echo $row['question_solution'];}else{echo '<p><span class="AM">`Solucion`</span> &nbsp;</p>';};?></textarea>
					</div>

					<div class="elem">
						<span class="table_properties">Y esta solución redondeada a: <input type="text" name="round" placeholder="ejemplo: 2"
						<?php echo 'value="'.$row['question_round'].'"'; ?></input> decimal y acepta un error de <input type="text" name="error"
							placeholder="ejemplo: 0.1" <?php echo 'value="'.$row['question_error'].'"'; ?></input>
						</span>
					</div>
					<div class="elem">
						<span class="table_properties"> <input type="checkbox" name="solution_checker" value="1" <?php if($row['question_check']) {echo "checked";}?>>
							Enseñar la solución en el enunciado (solo para pruebas)
							<button type="submit">Guardar solución</button>
						</span>
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
		<!--<iframe id="ifr" src="http://163.117.69.19:8000/exercises/aa.html" height="700" width="850" seamless></iframe>-->
		<iframe id="ifr" src=<? echo "\"http://baal.uc3m.es:8080/khan/exercises/".$_COOKIE['user'].".html\"";?> height="700" width="850" seamless></iframe>
		<!-- <p>La visualización de ejercicios está desactivada temporalmente, lamentamos todos los inconvenientes que esto pueda causar</p> -->

	</div>
	<!-- End of tab2 (exercise preview) -->
	<div id="tabs-3">
		<p>Este es el codigo XML del ejercicio de Khan, probablemente no te sirva de mucho</p>
		<?php include("./libs/parser.php");?>
		<textarea cols="98" rows="40">
			<?php process_and_parse(); ?>
		</textarea>
	</div>
	<!-- End of tab3 (exercise code) -->
</div>
<?php include("./libs/tinymceinits.php");?>
