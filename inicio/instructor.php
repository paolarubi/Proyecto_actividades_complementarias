<?php
	require_once('../conexion/conexion.php');
?>
<?php
	$sql = 'SELECT * FROM instructor ORDER BY RFC_instructor';
	$statement = $pdo->prepare($sql);
	$statement->execute(array());
	$results = $statement->fetchAll();

  $sql_status = 'SELECT instructor.*, actividad_comp.Nombre_actividad FROM instructor INNER JOIN actividad_comp ON actividad_comp.Num_actividad = instructor.actividad_complement ORDER BY RFC_instructor';
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
		<title>PHP & SQL</title>
		<link rel="stylesheet" href="../css/materialize.min.css">
		</head>

	<body>
		<!--Import jQuery before materialize.js-->
    	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    	<script type="text/javascript" src="js/materialize.min.js"></script>
    	<div class="navbar-fixed">
        <nav class="red accent-4">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo right">Instructor</a>
                <ul id="nav-mobile" class="left side-nav">
                    <li><a href="index.php">Inicio</a></li>
                </ul>
            </div>
        </nav>
    </div>
		<div class="container">
			<div class="row">
				<div class="col s12">
					<h2>Ejecuci&oacute;n de una sentencia SQL</h2>
					<hr>
					<h3>Datos SQL</h3>
					<pre>

					</pre>

					<h3>Instructor</h3>
					<hr>
					<table class="striped">
				        <thead>
				          <tr>
				              <th>RFC</th>
				              <th>NOMBRE</th>
				              <th>APELLIDO PATERNO</th>
				              <th>APELLIDO MATERNO</th>
				              <th>ACTIVIDAD COMPLEMENTARIA</th>
				          </tr>
				        </thead>
				        <tbody>
				        	<?php
				        		foreach($results_status as $rs) {
				        	?>
				          <tr>
							<td><?php echo $rs['RFC_instructor']?></td>
							<td><?php echo $rs['Nombre_instructor']?></td>
							<td><?php echo $rs['Apellido_p_instructor']?></td>
							<td><?php echo $rs['Apellido_m_instructor']?></td>
							<td><?php echo $rs['Nombre_actividad']?></td>
            </tr>
                                                 <?php
                                                    }
                                                  ?>
                  </tbody>
              </table>
            </div>
            </div>
            <div class="col s12">
                  <footer class="page-footer teal lighten-2">
                      <div class="footer-copyright">
                          <div class="container">
                              &copy; 2017 Paola Rubi Benitez Bartolo
                          </div>
                      </div>
                  </footer>
              </div>
              </div>
            </body>
            </html>
