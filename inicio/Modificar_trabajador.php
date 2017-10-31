<?php
	require_once('../conexion/conexion.php');
	$title = 'actividades';
	$title_menu = 'Actividades';

	$show_form = FALSE;
	if($_POST)
	{
	  	//TODO:UPDATE ARTICLE
	  	$sql_update_details = 'UPDATE trabajador SET RFC_trabajador = ?, Nombre_trabajador = ?, Apellido_p_trabajador = ?, Apellido_m_trabajador = ?, clave_presupuestal = ? WHERE RFC_trabajador = ?';

      $RFC_trabajador = isset($_GET['RFC_trabajador']) ? $_GET['RFC_trabajador']: '';
      $RFC_trabajador_2 = isset($_POST['RFC_trabajador_2']) ? $_POST['RFC_trabajador_2']: '';
  		$Nombre_trabajador = isset($_POST['Nombre_trabajador']) ? $_POST['Nombre_trabajador']: '';
      $Apellido_p_trabajador = isset($_POST['Apellido_p_trabajador']) ? $_POST['Apellido_p_trabajador']: '';
      $Apellido_m_trabajador = isset($_POST['Apellido_m_trabajador']) ? $_POST['Apellido_m_trabajador']: '';
      $clave_presupuestal = isset($_POST['clave_presupuestal']) ? $_POST['clave_presupuestal']: '';
      $statement_update_details = $pdo->prepare($sql_update_details);
	  	$statement_update_details->execute(array($RFC_trabajador_2,$Nombre_trabajador,$Apellido_p_trabajador,$Apellido_m_trabajador,$clave_presupuestal,$RFC_trabajador));
	  	header('Location: Modificar_trabajador.php');
	}
	if(isset( $_GET['RFC_trabajador'] ) )
	{
		//TODO: GET DETAILS
		$show_form = TRUE;
		$sql_update = 'SELECT * FROM trabajador WHERE RFC_trabajador = ?';
		$RFC_trabajador = isset( $_GET['RFC_trabajador']) ? $_GET['RFC_trabajador'] : 0;
		$statement_update = $pdo->prepare($sql_update);
		$statement_update->execute(array($RFC_trabajador));
		$result_details = $statement_update->fetchAll();
		$rs_details = $result_details[0];
	}
	$sql_status = 'SELECT * FROM trabajador';
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
          							<input value="<?php echo $rs_details['RFC_trabajador'] ?>" name="RFC_trabajador_2" type="text">
        						</div>
							</div>

              <div class="row">
										<div class="input-field col s4">
											<i class="material-icons prefix">account_circle</i>
												<input placeholder="<?php echo $rs_details['Nombre_trabajador'] ?>" name="Nombre_trabajador" type="text">
										</div>
										<div class="input-field col s4">
											<i class="material-icons prefix">account_circle</i>
												<input placeholder="<?php echo $rs_details['Apellido_p_trabajador'] ?>" name="Apellido_p_trabajador" type="text">
										</div>
										<div class="input-field col s4">
											<i class="material-icons prefix">account_circle</i>
											<input placeholder="<?php echo $rs_details['Apellido_m_trabajador'] ?>" name="Apellido_m_trabajador" type="text">
										</div>
									</div>

                  <div class="row">
    								<div class="input-field col s12">
              							<input value="<?php echo $rs_details['clave_presupuestal'] ?>" name="clave_presupuestal" type="text">
            						</div>
    							</div>


        				<input class="btn waves-effect waves-light" type="submit" value="Modificar" />
						</form>
						<?php } ?>
				    <h3>TRABAJADORES</h3>
				    <table class="striped">
					  <thead>
					    <tr>
					    	<th>RFC</th>
				          	<th>Nombre</th>
                    <th>Apellido paterno</th>
    				          	<th>Apellido materno</th>
                        <th>clave presupuestal</th>
        				          <th colspan="2"> Accion</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php
				        	foreach($results_status as $rs2) {
				        ?>
					    <tr>
					    	<td><?php echo $rs2['RFC_trabajador']?></td>
							<td><?php echo $rs2['Nombre_trabajador']?></td>
              <td><?php echo $rs2['Apellido_p_trabajador']?></td>
              <td><?php echo $rs2['Apellido_m_trabajador']?></td>
              <td><?php echo $rs2['clave_presupuestal']?></td>
							<td><a class="btn waves-effect waves-light" href="Modificar_trabajador.php?RFC_trabajador=<?php echo $rs2['RFC_trabajador']; ?>">Ver detalles</a></td>
          <td><a class="btn waves-effect waves-light red" onclick="delete_trabajador(<?php echo $rs2['RFC_trabajador']; ?>)" href="#">ELIMINAR</a>
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
