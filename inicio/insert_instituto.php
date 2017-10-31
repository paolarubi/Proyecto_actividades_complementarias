<?php
	require_once('../conexion/conexion.php');
	$title = 'Agregar un nuevo registro';

	if( $_POST )
	{
		$sql_insert = 'INSERT INTO instituto ( Clave_instituto, Nombre_instituto ) VALUES( ?, ? )';
		$Clave_instituto = isset($_POST['Clave_instituto']) ? $_POST['Clave_instituto']: '';
		$Nombre_instituto = isset($_POST['Nombre_instituto']) ? $_POST['Nombre_instituto']: '';
		$statement_insert = $pdo->prepare($sql_insert);
		$statement_insert->execute(array($Clave_instituto, $Nombre_instituto));
	}

	$sql_instituto = 'SELECT * FROM instituto';
  $statement = $pdo->prepare($sql_instituto);
	$statement->execute();
	$results = $statement->fetchAll();

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
	                <a href="#" class="brand-logo right">Institutos</a>
	                <ul id="nav-mobile" class="left side-nav">
	                    <li><a href="index.php">Inicio</a></li>
	                </ul>
	            </div>
	        </nav>
    	</div>
		<div class="container">
			<div class="row">
				<div class="col s12">
					<h2>Agregar una nuevo instituto</h2>
					<hr>
				</div>
			</div>

			<div class="row">
				<form method="post" class="col s12">

					<div class="row">
						<div class="input-field col s12">
									<input placeholder="Clave del instituto" name="Clave_instituto" type="text">
								</div>

						<div class="input-field col s12">
									<input placeholder="Nombre del instituto" name="Nombre_instituto" type="text">
								</div>

								 <input class="btn waves-effect waves-light" type="submit" value="Agregar" />
        		</form>
      		</div>
					</div>


<div class="container">
			<div class="row">
				<div class="col s12">
				    <h3>INSTITUTOS</h3>
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
