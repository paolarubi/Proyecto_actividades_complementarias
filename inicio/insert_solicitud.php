<?php
	require_once('../conexion/conexion.php');
	$title = 'Agregar un nuevo registro';

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

	if( $_POST )
	{
  		$sql_insert = 'INSERT INTO solicitud ( Folio, Asunto, Lugar, Fecha, Estudiante_Num_control, Instructor_RFC, Departamento_Clave, Instituto_Clave ) VALUES( ?, ?, ?, ?, ?, ?, ?, ? )';
  		$Folio = isset($_POST['Folio']) ? $_POST['Folio']: '';
  		$Asunto = isset($_POST['Asunto']) ? $_POST['Asunto']: '';
  		$Lugar = isset($_POST['Lugar']) ? $_POST['Lugar']: '';
  		$Fecha = isset($_POST['Fecha']) ? $_POST['Fecha']: '';
  		$Estudiante_Num_control = isset($_POST['Estudiante_Num_control']) ? $_POST['Estudiante_Num_control']: '';
  		$Instructor_RFC = isset($_POST['Instructor_RFC']) ? $_POST['Instructor_RFC']: '';
      $Departamento_Clave = isset($_POST['Departamento_Clave']) ? $_POST['Departamento_Clave']: '';
  		$Instituto_Clave = isset($_POST['Instituto_Clave']) ? $_POST['Instituto_Clave']: '';
  		$statement_insert = $pdo->prepare($sql_insert);
  		$statement_insert->execute(array($Folio,$Asunto,$Lugar, $Fecha, $Estudiante_Num_control, $Instructor_RFC,$Departamento_Clave,$Instituto_Clave));
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
	                <a href="#" class="brand-logo right">SOLICITUDES</a>
	                <ul id="nav-mobile" class="left side-nav">
	                    <li><a href="index.php">Inicio</a></li>
	                </ul>
	            </div>
	        </nav>
    	</div>
		<div class="container">
			<div class="row">
				<div class="col s12">
					<h2>Agregar una nueva solicitud</h2>
					<hr>
				</div>
			</div>
			<div class="row">
				<form method="post" class="col s12">
					<div class="row">
						<div class="input-field col s12">
          				<input placeholder="Folio" name="Folio" type="text">
        				</div>
					</div>
					<div class="row">
        				<div class="input-field col s4">
        				<input placeholder="Asunto" name="Asunto" type="text">
        				</div>
        				<div class="input-field col s4">
          				<input placeholder="Lugar" name="Lugar" type="text">
        				</div>
        				<div class="input-field col s4">
          				<input placeholder="Fecha" name="Fecha" type="text">
        				</div>
        			</div>

        			<div class="row">
        				<div class="input-field col s12">
                  		<select name="Estudiante_Num_control">
                  			<option value="" disabled selected>Elige el estudiante</option>
                  			<?php
				        	foreach($results as $rs) {
				        	?>
  							<option value="<?php echo $rs['Num_control']?>"><?php echo $rs['Nombre_estudiante']?></option>
  							<?php
				          	}
				        ?>
						</select>
						<label>Estudiante</label>
						</div>
          </div>
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
          						<label>Instructor</label>
          						</div>
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
          						<label>Departamento</label>
          						</div>
                  				<div class="input-field col s12">
                            		<select name="Instituto_Clave">
                            			<option value="" disabled selected>Elige la carrera</option>
                            			<?php
          				        	foreach($results_4 as $rs) {
          				        	?>
            							<option value="<?php echo $rs['Clave_instituto']?>"><?php echo $rs['Nombre_instituto']?></option>
            							<?php
          				          	}
          				        ?>
          						</select>
          						<label>Instituto</label>
          						</div>
        			<input class="btn waves-effect waves-light" type="submit" value="Agregar" />
        		</form>
      		</div>
			<div class="row">
				<div class="col s12">
				    <h3>Solicitudes</h3>
				    <table class="striped">
					  <thead>
					    <tr>
					    	<th>Folio</th>
				          	<th>Asunto</th>
				            <th>Lugar</th>
                     <th>Fecha</th>
				            <th>Estudiante</th>
				            <th>Instructor</th>
				            <th>Departamento</th>
                    <th>Instituto</th>
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
