<?php
	require_once('../conexion/conexion.php');
	$title = 'Agregar un nuevo registro';

	$sql_trabajador = 'SELECT * FROM trabajador';
	$statement = $pdo->prepare($sql_trabajador);
	$statement->execute();
	$results = $statement->fetchAll();

	if( $_POST )
	{
  		$sql_insert = 'INSERT INTO departamento ( Clave_departamento, Nombre_departamento, Trabajador_rfc ) VALUES( ?, ?, ?)';
  		$Clave_departamento = isset($_POST['Clave_departamento']) ? $_POST['Clave_departamento']: '';
  		$Nombre_departamento = isset($_POST['Nombre_departamento']) ? $_POST['Nombre_departamento']: '';
  		$Trabajador_rfc = isset($_POST['Trabajador_rfc']) ? $_POST['Trabajador_rfc']: '';
  		$statement_insert = $pdo->prepare($sql_insert);
  		$statement_insert->execute(array($Clave_departamento,$Nombre_departamento,$Trabajador_rfc));
	}
	$sql_status = 'SELECT departamento.*, trabajador.Nombre_trabajador FROM departamento INNER JOIN trabajador ON trabajador.RFC_trabajador = departamento.Trabajador_rfc ORDER BY Nombre_departamento';
	$statement_status = $pdo->prepare($sql_status);
	$statement_status->execute();
	$results_status = $statement_status->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<title><?php echo $title?></title>
		<link rel="stylesheet" href="../css/materialize.css">
		</head>

	<body>
		<!--Import jQuery before materialize.js-->
    	<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    	<script type="text/javascript" src="../js/materialize.min.js"></script>
    	<div class="navbar-fixed">
	        <nav class="teal lighten-1">
	            <div class="nav-wrapper">
	                <a href="#" class="brand-logo right">Instructores</a>
	                <ul id="nav-mobile" class="left side-nav">
	                    <li><a href="index.php">Inicio</a></li>
	                </ul>
	            </div>
	        </nav>
    	</div>
		<div class="container">
			<div class="row">
				<div class="col s12">
					<h2>Agregar un nuevo departamento</h2>
					<hr>
				</div>
			</div>
			<div class="row">
				<form method="post" class="col s12">
					<div class="row">
						<div class="input-field col s12">
          				<input placeholder="Clave del departamento" name="Clave_departamento" type="text">
        				</div>
					</div>
					<div class="row">
        				<div class="input-field col s12">
          				<input placeholder="Nombre del departamento" name="Nombre_departamento" type="text">
        				</div>
        			</div>

        			<div class="row">
        				<div class="input-field col s12">
                  		<select name="Trabajador_rfc">
                  			<option value="" disabled selected>Elige el trabajador para este departamento</option>
                  			<?php
				        	foreach($results as $rs) {
				        	?>
  							<option value="<?php echo $rs['RFC_trabajador']?>"><?php echo $rs['Nombre_trabajador']?></option>
  							<?php
				          	}
				        ?>
						</select>
						<label>Trabajadores</label>
						</div>
        			</div>
        			<input class="btn waves-effect waves-light" type="submit" value="Agregar" />
        		</form>
      		</div>
			<div class="row">
				<div class="col s12">
				    <h3>INSTRUCTORES</h3>
				    <table class="striped">
					  <thead>
					    <tr>
					    	<th>Clave del departamento</th>
				          	<th>Nombre del departamento</th>
				            <th>Trabajador</th>
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
					    </tr>
					    <?php
				          	}
				        ?>
					</tbody>
					</table>
				</div>
			</div>
			<div class="col s12">
                <footer class="page-footer red accent-4">
                    <div class="footer-copyright">
                        <div class="container">
                            &copy; 2017 Paola Rubi Benitez Bartolo
                        </div>
                    </div>
                </footer>
            </div>
		</div>
		<!--  Scripts-->
    	<!--Import jQuery before materialize.js-->
      	<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
      	<script type="text/javascript" src="../js/materialize.min.js"></script>
      	<script>
      		$(document).ready(function() {
    		$('select').material_select();
  			});
      	</script>
	</body>
</html>
