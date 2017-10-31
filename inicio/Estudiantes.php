<?php
require_once('../conexion/conexion.php');
?>
<?php

	$sql_status = 'SELECT estudiante.*, carrera.Nombre_carrera FROM estudiante INNER JOIN carrera ON carrera.Clave_carrera = estudiante.Carrera_Clave ORDER BY Num_control';
	$statement_status = $pdo->prepare($sql_status);
	$statement_status->execute();
	$results_status = $statement_status->fetchAll();

?>
<!DOCTYPE html>
<html class="no-js" lang="es">
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
        <nav class="teal lighten-1">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo right">Estudiantes</a>
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

					<h3>Estudiantes</h3>
					<hr>
					<table class="striped">
				        <thead>
				          <tr>
				              <th>Numero de control</th>
					            <th>Nombre</th>
                      <th>Apellido paterno</th>
					            <th>Apellido materno</th>
                      <th>Semestre</th>
				              <th>Firma</th>
                      <th>Clave Carrera</th>

                </tr>
				   </thead>
				        <tbody>
                                                   <?php
                                                foreach($results_status as $rs) {
                                                     ?>
				          <tr>
				            <td><?php echo $rs['Num_control']?></td>
				            <td><?php echo $rs['Nombre_estudiante']?></td>
				            <td><?php echo $rs['Apellido_p_estudiante']?></td>
                    <td><?php echo $rs['Apellido_m_estudiante']?></td>
                    <td><?php echo $rs['Semestre']?></td>
                    <td><?php echo $rs['Firma']?></td>
                    <td><?php echo $rs['Nombre_carrera']?></td>
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
