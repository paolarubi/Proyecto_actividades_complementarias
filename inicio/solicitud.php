<?php
require_once('../conexion/conexion.php');
?>
<?php
	$sql = 'SELECT * FROM solicitud ORDER BY Asunto';

        $statement = $pdo->prepare($sql);
	$statement->execute(array());
	$results = $statement->fetchAll();

$sql_status = 'SELECT solicitud.*, instituto.Nombre_instituto, instructor.Nombre_instructor, estudiante.Nombre_estudiante, departamento.nombre_departamento FROM solicitud
                       INNER JOIN instituto ON instituto.Clave_instituto = solicitud.Instituto_Clave
                       INNER JOIN instructor ON instructor.RFC_instructor = solicitud.Instructor_RFC
                       INNER JOIN estudiante ON estudiante.Num_control = solicitud.Estudiante_Num_control
											 INNER JOIN departamento ON departamento.Clave_departamento = solicitud.Departamento_Clave';
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
        <nav class="teal lighten-2">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo right">solicitud</a>
                <ul id="nav-mobile" class="left side-nav">
                    <li><a href="index.php">inicio</a></li>
                </ul>
            </div>
        </nav>
    </div>
		<div class="container">
		<div class="row">
				<div class="col s12">
					<h2>Ejecuci�n de una sentencia SQL</h2>
					<hr>
					<h3>Datos SQL</h3>
					<pre>

					</pre>
         <h3>SOLICITUD</h3>
					<hr>
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
		                                                foreach($results_status as $rs) {
		                                                     ?>
						          <tr>

				            <td><?php echo $rs['Folio']?></td>
				            <td><?php echo $rs['Asunto']?></td>
				            <td><?php echo $rs['Lugar']?></td>
						        <td><?php echo $rs['Fecha']?></td>
                    <td><?php echo $rs['Nombre_estudiante']?></td>
                    <td><?php echo $rs['Nombre_instructor']?></td>
                    <td><?php echo $rs['nombre_departamento']?></td>
										<td><?php echo $rs['Nombre_instituto']?></td>

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
