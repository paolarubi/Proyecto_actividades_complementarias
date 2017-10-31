<?php
require_once('../conexion/conexion.php');
?>
<?php
	$sql = 'SELECT * FROM instituto ORDER BY Clave_instituto';

        $statement = $pdo->prepare($sql);
	$statement->execute(array());
	$results = $statement->fetchAll();

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
                <a href="#" class="brand-logo right">departamento</a>
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
            <h3>instituto</h3>
					<hr>
					<table class="striped">
				        <thead>
				          <tr>
				              <th>Clave del instituto</th>
				              <th>Nombre del instituto</th>
 </tr>
				        </thead>
				        <tbody>
									<?php
							 foreach($results as $rs) {
										?>
														<tr>
															<td><?php echo $rs['Clave_instituto']?></td>
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
