<?php
	require_once('../conexion/conexion.php');
	$title = 'Estudiantes';
	$title_menu = 'ESTUDIANTES';
	// Consulta para mostrar los datos de la tabla "Carrera"
	$sql_carrera = 'SELECT * FROM carrera';
	$statement = $pdo->prepare($sql_carrera);
	$statement->execute();
	$results = $statement->fetchAll();
	$show_form = FALSE;
	if($_POST)
	{
	  	//TODO:UPDATE ARTICLE
	  	$sql_update_details = 'UPDATE estudiante SET Num_control = ?, Nombre_estudiante = ?, Apellido_p_estudiante = ?, Apellido_m_estudiante = ?, Semestre = ?, Carrera_Clave = ? WHERE Num_control = ?';
		  $Num_control = isset($_GET['Num_control']) ? $_GET['Num_control']: '';
		  $Num_control_2 = isset($_POST['Num_control_2']) ? $_POST['Num_control_2']: '';
  		$Nombre_estudiante = isset($_POST['Nombre_estudiante']) ? $_POST['Nombre_estudiante']: '';
  		$Apellido_p_estudiante = isset($_POST['Apellido_p_estudiante']) ? $_POST['Apellido_p_estudiante']: '';
  		$Apellido_m_estudiante = isset($_POST['Apellido_m_estudiante']) ? $_POST['Apellido_m_estudiante']: '';
  		$Semestre = isset($_POST['Semestre']) ? $_POST['Semestre']: '';
  		$Carrera_Clave = isset($_POST['Carrera_Clave']) ? $_POST['Carrera_Clave']: '';
	  	$statement_update_details = $pdo->prepare($sql_update_details);
	  	$statement_update_details->execute(array($Num_control_2,$Nombre_estudiante,$Apellido_p_estudiante,$Apellido_m_estudiante,$Semestre,$Carrera_Clave, $Num_control));
	  	header('Location: Modificar_estudiante.php');
	}
	if(isset( $_GET['Num_control'] ) )
	{
		//TODO: GET DETAILS
		$show_form = TRUE;
		$sql_update = 'SELECT estudiante.*, carrera.Nombre_carrera FROM estudiante INNER JOIN carrera ON carrera.Clave_carrera = estudiante.Carrera_Clave WHERE Num_control = ?';
		$Num_control = isset( $_GET['Num_control']) ? $_GET['Num_control'] : 0;
		$statement_update = $pdo->prepare($sql_update);
		$statement_update->execute(array($Num_control));
		$result_details = $statement_update->fetchAll();
		$rs_details = $result_details[0];
	}
	$sql_status = 'SELECT estudiante.*, carrera.Nombre_carrera FROM estudiante INNER JOIN carrera ON carrera.Clave_carrera = estudiante.Carrera_Clave';
	$statement_status = $pdo->prepare($sql_status);
	$statement_status->execute();
	$results_status = $statement_status->fetchAll();
?>
<?php
	include('../extend/header.php');
?>

		<div class="container">
			<div class="row">
				<div class="col s12">

					<hr>
					<?php
						if( $show_form )
						{
						?>
						<form method="post">
							<div class="row">
								<div class="input-field col s12">

          							<input placeholder="<?php echo $rs_details['Num_control'] ?>" name="Num_control_2" type="text">
        						</div>
							</div>
							<div class="row">
        						<div class="input-field col s4">

          							<input placeholder="<?php echo $rs_details['Nombre_estudiante'] ?>" name="Nombre_estudiante" type="text">
        						</div>
        						<div class="input-field col s4">

          							<input placeholder="<?php echo $rs_details['Apellido_p_estudiante'] ?>" name="Apellido_p_estudiante" type="text">
        						</div>
        						<div class="input-field col s4">

          						<input placeholder="<?php echo $rs_details['Apellido_m_estudiante'] ?>" name="Apellido_m_estudiante" type="text">
        						</div>
        					</div>
        					<div class="row">
        						<div class="input-field col s12">
    								<select name="Semestre">
			      						<option value="" disabled selected>ELIGE SEMESTRE</option>
			      						<option value="I" <?php $selected = ($rs_details['Semestre'] == 'I') ? "SELECTED" : ""; echo $selected ?>>I</option>
			  							<option value="II" <?php $selected = ($rs_details['Semestre'] == 'II') ? "SELECTED" : ""; echo $selected ?>>II</option>
			  							<option value="III" <?php $selected = ($rs_details['Semestre'] == 'III') ? "SELECTED" : ""; echo $selected ?>>III</option>
			  							<option value="IV" <?php $selected = ($rs_details['Semestre'] == 'IV') ? "SELECTED" : ""; echo $selected ?>>IV</option>
			  							<option value="V" <?php $selected = ($rs_details['Semestre'] == 'V') ? "SELECTED" : ""; echo $selected ?>>V</option>
			  							<option value="VI" <?php $selected = ($rs_details['Semestre'] == 'VI') ? "SELECTED" : ""; echo $selected ?>>VI</option>
			  							<option value="VII" <?php $selected = ($rs_details['Semestre'] == 'VII') ? "SELECTED" : ""; echo $selected ?>>VII</option>
			  							<option value="VIII" <?php $selected = ($rs_details['Semestre'] == 'VIII') ? "SELECTED" : ""; echo $selected ?>>VIII</option>
			  							<option value="IX" <?php $selected = ($rs_details['Semestre'] == 'IX') ? "SELECTED" : ""; echo $selected ?>>IX</option>
			  							<option value="X" <?php $selected = ($rs_details['Semestre'] == 'X') ? "SELECTED" : ""; echo $selected ?>>X</option>
			  							<option value="XI" <?php $selected = ($rs_details['Semestre'] == 'XI') ? "SELECTED" : ""; echo $selected ?>>XI</option>
			  							<option value="XII" <?php $selected = ($rs_details['Semestre'] == 'XII') ? "SELECTED" : ""; echo $selected ?>>XII</option>
    								</select>
    								<label>SEMESTRE</label>
  								</div>
        					</div>
        					<div class="row">
        						<div class="input-field col s12">
                  					<select name="Carrera_Clave">
                  						<option value="" disabled selected>ELIGE CARRERA</option>
                  						<?php
				        					foreach($results as $rs) {
				        				?>

  										<option value="<?php echo $rs['Clave_carrera']?>"><?php echo $rs['Nombre_carrera']?></option>
  										<?php
				          					}
				        				?>
									</select>
									<label>CARRERA</label>
								</div>
        					</div>

        				<input class="btn waves-effect waves-light" type="submit" value="Modificar" />
						</form>
						<?php } ?>
				    <h3>ESTUDIANTES</h3>
				    <table class="striped">
					  <thead>
					    <tr>
					    	<th>NUMERO DE CONTROL</th>
				          	<th>NOMBRE</th>
				            <th>APELLIDO PATERNO</th>
				            <th>APELLIDO MATERNO</th>
				            <th>SEMESTRE</th>
				            <th>CARRERA</th>
				            <th colspan="2">Modificar</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php
				        	foreach($results_status as $rs2) {
				        ?>
					    <tr>
					    	<td><?php echo $rs2['Num_control']?></td>
							<td><?php echo $rs2['Nombre_estudiante']?></td>
							<td><?php echo $rs2['Apellido_p_estudiante']?></td>
							<td><?php echo $rs2['Apellido_m_estudiante']?></td>
							<td><?php echo $rs2['Semestre']?></td>
							<td><?php echo $rs2['Nombre_carrera']?></td>
							<td><a class="btn waves-effect waves-light green" href="Modificar_estudiante.php?Num_control=<?php echo $rs2['Num_control']; ?>">Modificar</a></td>
							<td><a class="btn waves-effect waves-light red" onclick="delete_estudiante(<?php echo $rs2['Num_control']; ?>)" href="#">ELIMINAR</a>
					    </tr>
					    <?php
				          	}
				        ?>
					</tbody>
					</table>
				</div>
			</div>
			<?php
				include('../extend/footer.php');
			?>
