<?php
	require_once('../conexion/conexion.php');
	$title = 'Institutos';
	$title_menu = 'Institutos';

	$show_form = FALSE;
	if($_POST)
	{
	  	//TODO:UPDATE ARTICLE
	  	$sql_update_details = 'UPDATE instituto SET Clave_instituto = ?, Nombre_instituto = ? WHERE Clave_instituto = ?';
		  $Clave_instituto = isset($_GET['Clave_instituto']) ? $_GET['Clave_instituto']: '';
		  $Clave_instituto_2 = isset($_POST['Clave_instituto_2']) ? $_POST['Clave_instituto_2']: '';
  		$Nombre_instituto = isset($_POST['Nombre_instituto']) ? $_POST['Nombre_instituto']: '';

	  	$statement_update_details = $pdo->prepare($sql_update_details);
	  	$statement_update_details->execute(array($Clave_instituto_2,$Nombre_instituto,$Clave_instituto));
	  	header('Location: Modificar_instituto.php');
	}
	if(isset( $_GET['Clave_instituto'] ) )
	{
		//TODO: GET DETAILS
		$show_form = TRUE;

		$sql_update = 'SELECT * FROM instituto WHERE Clave_instituto = ?';
		$Clave_instituto = isset( $_GET['Clave_instituto']) ? $_GET['Clave_instituto'] : 0;
		$statement_update = $pdo->prepare($sql_update);
		$statement_update->execute(array($Clave_instituto));
		$result_details = $statement_update->fetchAll();
		$rs_details = $result_details[0];
	}
	$sql_status = 'SELECT * FROM instituto ORDER BY Clave_instituto';
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
          							<input value="<?php echo $rs_details['Clave_instituto'] ?>" name="Clave_instituto_2" type="text">
        						</div>
							</div>

              <div class="row">
								<div class="input-field col s12">
          							<input value="<?php echo $rs_details['Nombre_instituto'] ?>" name="Nombre_instituto" type="text">
        						</div>
							</div>

        				<input class="btn waves-effect waves-light" type="submit" value="Modificar" />
						</form>
						<?php } ?>
				    <h3>Institutos</h3>
				    <table class="striped">
					  <thead>
					    <tr>
					    	<th>Clave del instituto</th>
				          	<th>Nombre del instituto</th>
                    <th>Accion</th>

					    </tr>
					  </thead>
					  <tbody>
					  	<?php
				        	foreach($results_status as $rs2) {
				        ?>
					    <tr>
					    	<td><?php echo $rs2['Clave_instituto']?></td>
							<td><?php echo $rs2['Nombre_instituto']?></td>

							<td><a class="btn waves-effect waves-ligth green" href="Modificar_instituto.php?Clave_instituto=<?php echo $rs2['Clave_instituto']; ?>">Ver detalles</a></td>
              <td><a class="btn waves-effect waves-light red" onclick="delete_instituto(<?php echo $rs2['Clave_instituto']; ?>)" href="#">ELIMINAR</a>
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
