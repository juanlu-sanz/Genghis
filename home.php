<div class="container">
	
	<?php
	include("variable_Modal.php");
	include("parser.php");
	include("renamer.php");
	
	$_POST['min'] == "";
	$_POST['max'] == "";
	
	

	if (isset($_SESSION['num_var_session'])) {
		$number_variables = $_SESSION['num_var_session'];	
	}
	if (isset($_SESSION['text_session'])) {
		$exercise_text = $_SESSION['text_session'];	
	}
	if (isset($_SESSION['subject_session'])) {
		$subject_text = $_SESSION['subject_session'];	
	}
	if (isset($_SESSION['statement_session'])) {
		$statement_text = $_SESSION['statement_session'];	
	}
	if (isset($_SESSION['solution_session'])) {
		$solution_text = $_SESSION['solution_session'];	
	}
	if (isset($_SESSION['hints_session'])) {
		$hints_text = $_SESSION['hints_session'];	
	}

	if (isset($_POST['var_name']) && $_POST['var_name'] != "") {
		if ($_POST['var_type'] == "Number"){
			if ($_POST['min']!="" && $_POST['max'] != "" ) {
				$number_variables[$_POST['var_name']] = "randRange(".$_POST['min'].", ".$_POST['max'].")";
				$_POST['min'] == "";
				$_POST['max'] == "";
			} else {
				$number_variables[$_POST['var_name']] = "randRange(0, 10)";
			}
		} elseif ($_POST['var_type'] == "Person name") {
			$number_variables[$_POST['var_name']] = "person(5)";
		}
	}
	if (isset($_POST['exer_text'])) {
		$exercise_text = $_POST['exer_text'];
	}
	if (isset($_POST['subj_text'])) {
		$subject_text = $_POST['subj_text'];
	}
	if (isset($_POST['stat_text'])) {
		$statement_text = $_POST['stat_text'];
	}
	if (isset($_POST['sol_text'])) {
		$solution_text = $_POST['sol_text'];
	}
	if (isset($_POST['hin_text']) && $_POST['hin_text'] != "") {
		if (!isset($hints_text)) {
			$hints_text = array($_POST['hin_text']);
		} else {
			array_push($hints_text, $_POST['hin_text']);
		}
		$_POST['hin_text']="";
		
	}
	
	if ($_GET['del'] != "") {
		if (isset($number_variables)) {
			$temp;
			foreach ($number_variables as $name => $type_of_var) {
				if ($_GET['del'] != $name) {
					$temp[$name] = $type_of_var;
				}
				$number_variables = $temp;
			}
		}
		header('Location: http://www.gast.it.uc3m.es'); 
	}

	if ($_GET['del_hint'] != "") {
		if (isset($hints_text)) {
			$temp = array();
			foreach ($hints_text as $index => $hint) {
				if ($_GET['del_index'] != $index) {
					$temp[] = $hint;
				}
			}
			$hints_text = $temp;
		}
		header('Location: http://www.gast.it.uc3m.es'); 
	}


	$_SESSION['num_var_session'] = $number_variables;
	$_SESSION['text_session'] = $exercise_text;
	$_SESSION['statement_session'] = $statement_text;
	$_SESSION['subject_session'] = $subject_text;
	$_SESSION['solution_session'] = $solution_text;
	$_SESSION['hints_session'] = $hints_text;
	?> 
	<!-- Example row of columns -->
	<div class="row">
		<div class="span7">

			<!--  %%%%% Creation and management of number variables %%%%%  -->
			<div class="well">
				<h3>Variables</h4>
					<br/>
					<h4>Current variables</h5>	
						<?php
						if (isset($number_variables)) {
							?>
							<table class="table table-condensed table-striped">
								<thead>
									<tr>
										<th>Edit</th>
										<th>Type of Variable</th>
										<th>Name</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($number_variables as $name => $type_of_var) {
										if ($_GET['edit'] != "$name") {
											?>	
											<tr>
												<td class="span1">
													<a href=<?php echo "\"?edit=" . $name . "\""; ?> rel="tooltip" title=<?php echo "\"Edit variable ". $name."\""; ?>><span id="tooltips" style="line-height:175%"><i class="icon-pencil"></i></span></a>
												</td>
												<td class="span5">
													<?php pretty_print($type_of_var); ?>
												</td>
												<td>
													<?php echo $name; ?>
												</td>
												<td class="span1">
													<a class="close" href=<?php echo "\"?del=" . $name . "\""; ?> >&times;</a>
												</td>
											</tr>
											<?php 
										} else {
											?>
											<tr>
												<form class="form-inline" action="?p=home" method="post">

													<!-- <div class="controls"> -->
													<td>
														<button type="submit" class="btn btn-success"><i class="icon-ok"></i></button>
													</td>

													<td>
														<select class="span2" name="var_type" id="var_type">
														<option>Number</option>
														<option>Person name</option>
													</select>
													<input type="text" class="input-small" value=<?php echo "\"".$name."\""; ?> name="min" id="min">
													<input type="text" class="input-small" value=<?php echo "\"".$name."\""; ?> name="max" id="max">
													</td>
													
													<td>
														<input type="text" class="input-small" value=<?php echo "\"".$name."\""; ?> name="var_name" id="var_name">
													</td>
													
												</form>
											</tr>

											<?php
										}
									}

									?>
								</tbody>
							</table>
							<?php
						} else {
							echo "There are no variables!";
						}

						?>
						<h4>Add new variable</h4>
						<form class="form-inline" action="?p=home" method="post">

							<!-- <div class="controls"> -->
							<select class="span2" name="var_type" id="var_type">
								<option>Number</option>
								<option>Person name</option>
							</select>
							<input type="text" class="input-small" placeholder="Variable name" name="var_name" id="var_name">
							<input type="text" class="input-small" placeholder="Minimum" name="min" id="min">
							<input type="text" class="input-small" placeholder="Maximum" name="max" id="max">
							<button type="submit" class="btn btn-success"><i class="icon-plus-sign icon-white"></i></button>
						</form>
						<!-- </div> -->
					</div>

					<!--  %%%%% Creation and management of the exercise text %%%%%  -->
					<div class="well">
						<form class="" action="?p=home" method="post">
							<h4>Title</h4>
							<textarea class="span6" name="subj_text" id="subj_text" rows="1"><?php
							if (isset($subject_text)) {
								echo $subject_text;
							}
							?></textarea>
							<h4>Statement</h4>
							<textarea class="span6" name="stat_text" id="stat_text" rows="5"><?php
							if (isset($statement_text)) {
								echo $statement_text;
							}
							?></textarea>
							<h4>Question</h4>
							<textarea class="span6" name="exer_text" id="exer_text" rows="5"><?php
							if (isset($exercise_text)) {
								echo $exercise_text;
							}
							?></textarea>
							<h4>Solution</h4>
							<textarea class="span6" name="sol_text" id="sol_text" rows="1"><?php
							if (isset($solution_text)) {
								echo $solution_text;
							}
							?></textarea>
							<h3>Hints</h3>
							<div class="well">
								<h4>Current Hints</h4>
								<?php if (isset($hints_text)) {
									?>
									<table class="table table-condensed table-striped">
										<thead>
											<tr>
												<th>Edit</th>
												<th>#</th>
												<th>Content</th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach ($hints_text as $index => $hint) {
												?>	
												<tr>
													<td class="span1">
														<a data-toggle="modal" href=<?php echo "\"#".implode("-", explode(" ", $name))."modal\""; ?> rel="tooltip" title=<?php echo "\"Edit hint ". ($index+1)."\""; ?>><span id="tooltips" style="line-height:175%"><i class="icon-pencil"></i></span></a>
													</td>
													<td class="span1">
														<?php echo $index+1; ?>
													</td>
													<td>
														<?php echo $hint; ?>
													</td>
													<td>
														<a class="close" href=<?php echo "\"?del_hint=" . $index . "\""; ?> >&times;</a>
													</td>
												</tr>
												<?php 
											}

											?>
										</tbody>
									</table>
									<?php
								} else {
									echo "There are no hints!";
								} ?>

								<h4>Add new hint</h4>
								<textarea class="span6" name="hin_text" id="hin_text" rows="1"><?php
							//if (isset($hints_text)) {
							//	echo $hints_text;
							//}
								?></textarea>
							</div>
							<button type="submit" class="btn">Save text</button>
						</form>
					</div>
					<!-- <p><a class="btn btn-primary btn-large" href="?process=1">Done, please parse! &raquo;</a></p>  -->
				</div>


				<div class="span5">

					<?php
					?><textarea class="span5" rows="30"><?php
					process_and_parse();
					?></textarea><?php
					?>

				</div>

			</div>












			<hr>
			<footer>
				<p>&copy; UC3M 2012</p>
			</footer>

</div> <!-- /contai