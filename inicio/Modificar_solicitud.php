<?php
	require_once('../conexion/conexion.php');
	$title = 'Solicitudes';
	$title_menu = 'SOLICITUDES';

  $sql_estudiante = 'SELECT * FROM estudiante';
  $statement = $pdo->prepare($sql_estudiante);
	$statement->execute();
	$results = $statement->fetchAll();

  $sql_instructor = 'SELECT * FROM instructor';
  $statement = $pdo->prepare($sql_instructor);
  $statement->execute();
  $results_2 = $statement->fetchAll();

  $sql_departamento = 'SELECT * FROM departamento';
  $statement = $pdo->prepare($sql_departamento);
	$statement->execute();
	$results_3 = $statement->fetchAll();

  $sql_instituto = 'SELECT * FROM instituto';
  $statement = $pdo->prepare($sql_instituto);
	$statement->execute();
	$results_4 = $statement->fetchAll();

	$show_form = FALSE;
	if($_POST)
	{
	  	//TODO:UPDATE ARTICLE
	  	$sql_update_details = 'UPDATE solicitud SET Folio = ?, Asunto = ?, Lugar = ?, Fecha = ?, Estudiante_Num_control = ?, Instructor_RFC = ?, Departamento_Clave = ?, Instituto_Clave = ? WHERE Folio = ?';
		  $Folio = isset($_GET['Folio']) ? $_GET['Folio']: '';
		  $Folio_2 = isset($_POST['Folio_2']) ? $_POST['Folio_2']: '';
  		$Asunto = isset($_POST['Asunto']) ? $_POST['Asunto']: '';
  		$Lugar = isset($_POST['Lugar']) ? $_POST['Lugar']: '';
  		$Fecha = isset($_POST['Fecha']) ? $_POST['Fecha']: '';
  		$Estudiante_Num_control = isset($_POST['Estudiante_Num_control']) ? $_POST['Estudiante_Num_control']: '';
  		$Instructor_RFC = isset($_POST['Instructor_RFC']) ? $_POST['Instructor_RFC']: '';
      $Departamento_Clave = isset($_POST['Departamento_Clave']) ? $_POST['Departamento_Clave']: '';
      $Instituto_Clave = isset($_POST['Instituto_Clave']) ? $_POST['Instituto_Clave']: '';
	  	$statement_update_details = $pdo->prepare($sql_update_details);
	  	$statement_update_details->execute(array($Folio_2,$Asunto,$Lugar,$Fecha,$Estudiante_Num_control,$Instructor_RFC, $Departamento_Clave,$Instituto_Clave,$Folio));
	  	header('Location: Modificar_solicitud.php');
	}
	if(isset( $_GET['Folio'] ) )
	{
		//TODO: GET DETAILS
		$show_form = TRUE;
		$sql_update = 'SELECT solicitud.*, estudiante.Nombre_estudiante, instructor.Nombre_instructor, departamento.Nombre_departamento, instituto.Nombre_instituto
    FROM solicitud
    INNER JOIN estudiante ON estudiante.Num_control = solicitud.Estudiante_Num_control
    INNER JOIN instructor ON instructor.RFC_instructor = solicitud.Instructor_RFC
    INNER JOIN departamento ON departamento.Clave_departamento = solicitud.Departamento_Clave
    INNER JOIN instituto ON instituto.Clave_instituto = solicitud.Instituto_Clave WHERE Folio = ?';
		$Folio = isset( $_GET['Folio']) ? $_GET['Folio'] : 0;
		$statement_update = $pdo->prepare($sql_update);
		$statement_update->execute(array($Folio));
		$result_details = $statement_update->fetchAll();
		$rs_details = $result_details[0];
	}
  $sql_status = 'SELECT solicitud.*, estudiante.Nombre_estudiante, instructor.Nombre_instructor, departamento.Nombre_departamento, instituto.Nombre_instituto
  FROM solicitud
  INNER JOIN estudiante ON estudiante.Num_control = solicitud.Estudiante_Num_control
  INNER JOIN instructor ON instructor.RFC_instructor = solicitud.Instructor_RFC
  INNER JOIN departamento ON departamento.Clave_departamento = solicitud.Departamento_Clave
  INNER JOIN instituto ON instituto.Clave_instituto = solicitud.Instituto_Clave';
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
					<h2>Proyecto de actividades complementarias</h2>
					<hr>
					<?php
						if( $show_form )
						{
						?>
						<form method="post">
							<div class="row">
								<div class="input-field col s12">
          							<input value="<?php echo $rs_details['Folio'] ?>" name="Folio_2" type="text">
        						</div>
							</div>
							<div class="row">
        						<div class="input-field col s4">
        							<i class="material-icons prefix">account_circle</i>
          							<input placeholder="<?php echo $rs_details['Asunto'] ?>" name="Asunto" type="text">
        						</div>
        						<div class="input-field col s4">
        							<i class="material-icons prefix">account_circle</i>
          							<input placeholder="<?php echo $rs_details['Lugar'] ?>" name="Lugar" type="text">
        						</div>
        						<div class="input-field col s4">
        					 		<i class="material-icons prefix">account_circle</i>
          						<input placeholder="<?php echo $rs_details['Fecha'] ?>" name="Fecha" type="text">
        						</div>
        					</div>

        					<div class="row">
        						<div class="input-field col s12">
                  					<select name="Estudiante_Num_control">
                  						<option value="" disabled selected>Elige un estudiante</option>
                  						<?php
				        					foreach($results as $rs) {
				        				?>
  										<option value="<?php echo $rs['Num_control']?>"><?php echo $rs['Nombre_estudiante']?></option>
  										<?php
				          					}
				        				?>
									</select>
								</div>
        					</div>

                  <div class="row">
                    <div class="input-field col s12">
                            <select name="Instructor_RFC">
                              <option value="" disabled selected>Elige el instructor</option>
                              <?php
                          foreach($results_2 as $rs) {
                        ?>
                      <option value="<?php echo $rs['RFC_instructor']?>"><?php echo $rs['Nombre_instructor']?></option>
                      <?php
                            }
                        ?>
                  </select>
                  </div>
                  </div>

                  <div class="row">
        						<div class="input-field col s12">
                  					<select name="Departamento_Clave">
                  						<option value="" disabled selected>Elige el departamento</option>
                  						<?php
				        					foreach($results_3 as $rs) {
				        				?>
  										<option value="<?php echo $rs['Clave_departamento']?>"><?php echo $rs['Nombre_departamento']?></option>
  										<?php
				          					}
				        				?>
									</select>
								</div>
        					</div>

                  <div class="row">
        						<div class="input-field col s12">
                  					<select name="Instituto_Clave">
                  						<option value="" disabled selected>Elige el Instituto</option>
                  						<?php
				        					foreach($results_4 as $rs) {
				        				?>
  										<option value="<?php echo $rs['Clave_instituto']?>"><?php echo $rs['Nombre_instituto']?></option>
  										<?php
				          					}
				        				?>
									</select>
								</div>
        					</div>

        				<input class="btn waves-effect waves-light" type="submit" value="Modificar" />
						</form>
						<?php } ?>
				    <h3>Estudiantes</h3>
				    <table class="striped">
					  <thead>
					    <tr>
					    	<th>Folio</th>
				          	<th>Asunto</th>
				            <th>Lugar</th>
				            <th>Fecha</th>
				            <th>Estudiante</th>
				            <th>Instructor</th>
				            <th>Instituto</th>
										<th colspan="2"> Accion </th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php
				        	foreach($results_status as $rs2) {
				        ?>
					    <tr>
					    	<td><?php echo $rs2['Folio']?></td>
							<td><?php echo $rs2['Asunto']?></td>
							<td><?php echo $rs2['Lugar']?></td>
							<td><?php echo $rs2['Fecha']?></td>
							<td><?php echo $rs2['Nombre_estudiante']?></td>
							<td><?php echo $rs2['Nombre_instructor']?></td>
							<td><?php echo $rs2['Nombre_departamento']?></td>
							<td><?php echo $rs2['Nombre_instituto']?></td>
							<td><a class="btn waves-effect waves-light" href="Modificar_solicitud.php?Folio=<?php echo $rs2['Folio']; ?>">Ver detalles</a></td>
              <td><a class="btn waves-effect waves-light red" onclick="delete_solicitud(<?php echo $rs2['Folio']; ?>)" href="#">ELIMINAR</a>
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
