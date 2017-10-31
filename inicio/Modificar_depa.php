<?php
	require_once('../conexion/conexion.php');
	$title = 'Departamentos';
	$title_menu = 'Departamentos';

	$sql_trabajador = 'SELECT * FROM trabajador';
	$statement = $pdo->prepare($sql_trabajador);
	$statement->execute();
	$results = $statement->fetchAll();
	$show_form = FALSE;

	if($_POST)
	{
	  	//TODO:UPDATE ARTICLE
	  	$sql_update_details = 'UPDATE departamento SET Clave_departamento = ?, nombre_departamento = ?, Trabajador_rfc = ? WHERE Clave_departamento = ?';
		  $Clave_departamento = isset($_GET['Clave_departamento']) ? $_GET['Clave_departamento']: '';
		  $Clave_departamento_2 = isset($_POST['Clave_departamento_2']) ? $_POST['Clave_departamento_2']: '';
  		$Nombre_departamento = isset($_POST['Nombre_departamento']) ? $_POST['Nombre_departamento']: '';
  		$Trabajador_rfc = isset($_POST['Trabajador_rfc']) ? $_POST['Trabajador_rfc']: '';
	  	$statement_update_details = $pdo->prepare($sql_update_details);
	  	$statement_update_details->execute(array($Clave_departamento_2,$Nombre_departamento,$Trabajador_rfc, $Clave_departamento));
	  	header('Location: Modificar_depa.php');
	}
	if(isset( $_GET['Clave_departamento'] ) )
	{
		//TODO: GET DETAILS
		$show_form = TRUE;
		$sql_update = 'SELECT departamento.*, trabajador.Nombre_trabajador FROM departamento INNER JOIN trabajador ON trabajador.RFC_trabajador = departamento.Trabajador_rfc WHERE Clave_departamento = ?';
		$Clave_departamento = isset( $_GET['Clave_departamento']) ? $_GET['Clave_departamento'] : 0;
		$statement_update = $pdo->prepare($sql_update);
		$statement_update->execute(array($Clave_departamento));
		$result_details = $statement_update->fetchAll();
		$rs_details = $result_details[0];
	}
	$sql_status = 'SELECT departamento.*, trabajador.Nombre_trabajador FROM departamento INNER JOIN trabajador ON trabajador.RFC_trabajador = departamento.Trabajador_rfc';
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
          							<input value="<?php echo $rs_details['Clave_departamento'] ?>" name="Clave_departamento_2" type="text">
        						</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
          							<input value="<?php echo $rs_details['Nombre_departamento'] ?>" name="Nombre_departamento" type="text">
        						</div>
							</div>

        					<div class="row">
        						<div class="input-field col s12">
                  					<select name="Trabajador_rfc">
                  						<option value="" disabled selected>Elige el trabajador</option>
                  						<?php
				        					foreach($results as $rs) {
				        				?>
  										<option value="<?php echo $rs['RFC_trabajador']?>"><?php echo $rs['Nombre_trabajador']?></option>
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
					    	<th>Clave departamento</th>
				          	<th>Nombre del departamento</th>
				            <th>Nombre del trabajador</th>
				            <th>Accion</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php
				        	foreach($results_status as $rs2) {
				        ?>
					    <tr>
					    	<td><?php echo $rs2['Clave_departamento']?></td>
							<td><?php echo $rs2['Nombre_departamento']?></td>
							<td><?php echo $rs2['Nombre_trabajador']?></td>
							<td><a class="btn waves-effect waves-light" href="Modificar_depa.php?Clave_departamento=<?php echo $rs2['Clave_departamento']; ?>">Ver detalles</a></td>
              <td><a class="btn waves-effect waves-light red" onclick="delete_depa(<?php echo $rs2['Clave_departamento']; ?>)" href="#">ELIMINAR</a>
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
