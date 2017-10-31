<?php
	require_once('../conexion/conexion.php');
	$title = 'carreras';
	$title_menu = 'Carreras';

	$show_form = FALSE;
	if($_POST)
	{
	  	//TODO:UPDATE ARTICLE
	  	$sql_update_details = 'UPDATE carrera SET Clave_carrera = ?, Nombre_carrera = ? WHERE Clave_carrera = ?';
		  $Clave_carrera = isset($_GET['Clave_carrera']) ? $_GET['Clave_carrera']: '';
		  $Clave_carrera_2 = isset($_POST['Clave_carrera_2']) ? $_POST['Clave_carrera_2']: '';
  		$Nombre_carrera = isset($_POST['Nombre_carrera']) ? $_POST['Nombre_carrera']: '';

	  	$statement_update_details = $pdo->prepare($sql_update_details);
	  	$statement_update_details->execute(array($Clave_carrera_2,$Nombre_carrera,$Clave_carrera));
	  	header('Location: Modificar_carrera.php');
	}
	if(isset( $_GET['Clave_carrera'] ) )
	{
		//TODO: GET DETAILS
		$show_form = TRUE;
		$sql_update = 'SELECT * FROM carrera WHERE Clave_carrera = ?';
		$Clave_carrera = isset( $_GET['Clave_carrera']) ? $_GET['Clave_carrera'] : 0;
		$statement_update = $pdo->prepare($sql_update);
		$statement_update->execute(array($Clave_carrera));
		$result_details = $statement_update->fetchAll();
		$rs_details = $result_details[0];
	}
	$sql_status = 'SELECT * FROM carrera ORDER BY Nombre_carrera';
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
          							<input value="<?php echo $rs_details['Clave_carrera'] ?>" name="Clave_carrera_2" type="text">
        						</div>
							</div>

              <div class="row">
								<div class="input-field col s12">
          							<input value="<?php echo $rs_details['Nombre_carrera'] ?>" name="Nombre_carrera" type="text">
        						</div>
							</div>

        				<input class="btn waves-effect waves-light" type="submit" value="Modificar" />
						</form>
						<?php } ?>
				    <h3>Carreras</h3>
				    <table class="striped">
					  <thead>
					    <tr>
					    	<th>Clave Carrera</th>
				          	<th>Nombre de la carrera</th>
                 <th colspan="2"> Accion</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php
				        	foreach($results_status as $rs2) {
				        ?>
					    <tr>
					    	<td><?php echo $rs2['Clave_carrera']?></td>
							<td><?php echo $rs2['Nombre_carrera']?></td>
							<td><a class="btn waves-effect waves-light green" href="Modificar_carrera.php?Clave_carrera=<?php echo $rs2['Clave_carrera']; ?>">Ver detalles</a></td>
							<td><a class="btn waves-effect waves-light red" onclick="delete_carrera(<?php echo $rs2['Clave_carrera']; ?>)" href="#">ELIMINAR</a>
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
