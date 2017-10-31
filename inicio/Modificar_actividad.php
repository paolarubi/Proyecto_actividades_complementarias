<?php
	require_once('../conexion/conexion.php');
	$title = 'actividades';
	$title_menu = 'Actividades';

	$show_form = FALSE;
	if($_POST)
	{
	  	//TODO:UPDATE ARTICLE
	  	$sql_update_details = 'UPDATE actividad_comp SET Num_actividad = ?, Nombre_actividad = ? WHERE Num_actividad = ?';
		  $Num_actividad = isset($_GET['Num_actividad']) ? $_GET['Num_actividad']: '';
		  $Num_actividad_2 = isset($_POST['Num_actividad_2']) ? $_POST['Num_actividad_2']: '';
  		$Nombre_actividad = isset($_POST['Nombre_actividad']) ? $_POST['Nombre_actividad']: '';
      $statement_update_details = $pdo->prepare($sql_update_details);
	  	$statement_update_details->execute(array($$Num_actividad_2,$Nombre_actividad,$Num_actividad));
	  	header('Location: Modificar_actividad.php');
	}
	if(isset( $_GET['Num_actividad'] ) )
	{
		//TODO: GET DETAILS
		$show_form = TRUE;
		$sql_update = 'SELECT * FROM actividad_comp WHERE Num_actividad = ?';
		$Num_actividad = isset( $_GET['Num_actividad']) ? $_GET['Num_actividad'] : 0;
		$statement_update = $pdo->prepare($sql_update);
		$statement_update->execute(array($Num_actividad));
		$result_details = $statement_update->fetchAll();
		$rs_details = $result_details[0];
	}
	$sql_status = 'SELECT * FROM actividad_comp ORDER BY Nombre_actividad';
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
          							<input value="<?php echo $rs_details['Num_actividad'] ?>" name="Num_actividad_2" type="text">
        						</div>
							</div>

              <div class="row">
								<div class="input-field col s12">
          							<input value="<?php echo $rs_details['Nombre_actividad'] ?>" name="Nombre_actividad" type="text">
        						</div>
							</div>

        				<input class="btn waves-effect waves-light" type="submit" value="Modificar" />
						</form>
						<?php } ?>
				    <h3>Actividades</h3>
				    <table class="striped">
					  <thead>
					    <tr>
					    	<th>No actividad</th>
				          	<th>Nombre de la actividad</th>
                      <th colspan="2">Accion</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php
				        	foreach($results_status as $rs2) {
				        ?>
					    <tr>
					    	<td><?php echo $rs2['Num_actividad']?></td>
							<td><?php echo $rs2['Nombre_actividad']?></td>
							<td><a class="btn waves-effect waves-light" href="Modificar_actividad.php?Num_actividad=<?php echo $rs2['Num_actividad']; ?>">Ver detalles</a></td>
							<td><a class="btn waves-effect waves-light red" onclick="delete_actividad(<?php echo $rs2['Num_actividad']; ?>)" href="#">ELIMINAR</a>
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
