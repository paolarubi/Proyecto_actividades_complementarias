<?php
	require_once('../conexion/conexion.php');
	$title = 'Agregar un nuevo registro';

	$sql_actividad_comp = 'SELECT * FROM actividad_comp';
	$statement = $pdo->prepare($sql_actividad_comp);
	$statement->execute();
	$results = $statement->fetchAll();

	if( $_POST )
	{
  		$sql_insert = 'INSERT INTO instructor ( RFC_instructor, Nombre_instructor, Apellido_p_instructor, Apellido_m_instructor, actividad_complement ) VALUES( ?, ?, ?, ?, ?)';
  		$RFC_instructor = isset($_POST['RFC_instructor']) ? $_POST['RFC_instructor']: '';
  		$Nombre_instructor = isset($_POST['Nombre_instructor']) ? $_POST['Nombre_instructor']: '';
  		$Apellido_p_instructor = isset($_POST['Apellido_p_instructor']) ? $_POST['Apellido_p_instructor']: '';
  		$Apellido_m_instructor = isset($_POST['Apellido_m_instructor']) ? $_POST['Apellido_m_instructor']: '';
      $actividad_complement = isset($_POST['actividad_complement']) ? $_POST['actividad_complement']: '';
  		$statement_insert = $pdo->prepare($sql_insert);
  		$statement_insert->execute(array($RFC_instructor,$Nombre_instructor,$Apellido_p_instructor, $Apellido_m_instructor, $actividad_complement));
	}
	$sql_status = 'SELECT instructor.*, actividad_comp.Nombre_actividad FROM instructor INNER JOIN actividad_comp ON actividad_comp.Num_actividad = instructor.actividad_complement ORDER BY Nombre_instructor';
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
					<h2>Agregar un nuevo instructor</h2>
					<hr>
				</div>
			</div>
			<div class="row">
				<form method="post" class="col s12">
					<div class="row">
						<div class="input-field col s12">
          				<input placeholder="RFC del instructor" name="RFC_instructor" type="text">
        				</div>
					</div>
					<div class="row">
        				<div class="input-field col s4">
        				<i class="material-icons prefix">account_circle</i>
          				<input placeholder="Nombre" name="Nombre_instructor" type="text">
        				</div>
        				<div class="input-field col s4">
        					 <i class="material-icons prefix">account_circle</i>
          				<input placeholder="Apellido Paterno" name="Apellido_p_instructor" type="text">
        				</div>
        				<div class="input-field col s4">
        					 <i class="material-icons prefix">account_circle</i>
          				<input placeholder="Apellido Materno" name="Apellido_m_instructor" type="text">
        				</div>
        			</div>

        			<div class="row">
        				<div class="input-field col s12">
                  		<select name="actividad_complement">
                  			<option value="" disabled selected>Elige la actividad complementaria</option>
                  			<?php
				        	foreach($results as $rs) {
				        	?>
  							<option value="<?php echo $rs['Num_actividad']?>"><?php echo $rs['Nombre_actividad']?></option>
  							<?php
				          	}
				        ?>
						</select>
						<label>Actividad complementaria</label>
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
					    	<th>RFC del instructor</th>
				          	<th>Nombre</th>
				            <th>Apellido Paterno</th>
				            <th>Apellido Materno</th>
				            <th>Actividad complementaria</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php
				        	foreach($results_status as $rs2) {
				        ?>
					    <tr>
					    	<td><?php echo $rs2['RFC_instructor']?></td>
							<td><?php echo $rs2['Nombre_instructor']?></td>
							<td><?php echo $rs2['Apellido_p_instructor']?></td>
							<td><?php echo $rs2['Apellido_m_instructor']?></td>
							<td><?php echo $rs2['Nombre_actividad']?></td>
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
