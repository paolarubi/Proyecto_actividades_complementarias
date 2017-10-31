<?php
	require_once('../conexion/conexion.php');
	$title = 'Agregar un nuevo registro';

	if( $_POST )
	{
  		$sql_insert = 'INSERT INTO trabajador ( RFC_trabajador, Nombre_trabajador, Apellido_p_trabajador, Apellido_m_trabajador, clave_presupuestal ) VALUES( ?, ?, ?, ?, ? )';
      $RFC_trabajador = isset($_POST['RFC_trabajador']) ? $_POST['RFC_trabajador']: '';
      $Nombre_trabajador = isset($_POST['Nombre_trabajador']) ? $_POST['Nombre_trabajador']: '';
      $Apellido_p_trabajador = isset($_POST['Apellido_p_trabajador']) ? $_POST['Apellido_p_trabajador']: '';
  		$Apellido_m_trabajador= isset($_POST['Apellido_m_trabajador']) ? $_POST['Apellido_m_trabajador']: '';
      $clave_presupuestal = isset($_POST['clave_presupuestal']) ? $_POST['clave_presupuestal']: '';
  		$statement_insert = $pdo->prepare($sql_insert);
  		$statement_insert->execute(array($RFC_trabajador, $Nombre_trabajador, $Apellido_p_trabajador, $Apellido_m_trabajador, $clave_presupuestal));
	}

	$sql_trabajador = 'SELECT * FROM trabajador';
  $statement = $pdo->prepare($sql_trabajador);
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
	                <a href="#" class="brand-logo right">Trabajadores</a>
	                <ul id="nav-mobile" class="left side-nav">
	                    <li><a href="index.php">Inicio</a></li>
	                </ul>
	            </div>
	        </nav>
    	</div>
		<div class="container">
			<div class="row">
				<div class="col s12">
					<h2>Agregar una nuevo trabajador</h2>
					<hr>
				</div>
			</div>

			<div class="row">
				<form method="post" class="col s12">
					<div class="row">
						<div class="input-field col s12">
          				<input placeholder="RFC del trabajador" name="RFC_trabajador" type="text">
        				</div>
					   </div>

          <div class="row">
                <div class="input-field col s4">
                 <i class="material-icons prefix">account_circle</i>
                  <input placeholder="Nombre" name="Nombre_trabajador" type="text">
                </div>
                <div class="input-field col s4">
                 <i class="material-icons prefix">account_circle</i>
                  <input placeholder="Apellido Paterno" name="Apellido_p_trabajador" type="text">
                </div>
                <div class="input-field col s4">
                   <i class="material-icons prefix">account_circle</i>
                  <input placeholder="Apellido Materno" name="Apellido_m_trabajador" type="text">
                </div>
              </div>

                <div class="row">
      						<div class="input-field col s12">
                				<input placeholder="clave presupuestal" name="clave_presupuestal" type="text">
              				</div>
      					</div>

        		 <input class="btn waves-effect waves-light" type="submit" value="Agregar" />
        		</form>
      		</div>

<div class="container">
			<div class="row">
				<div class="col s12">
				    <h3>Trabajadores</h3>
				    <table class="striped">
					  <thead>
					    <tr>
                <th>RFC del trabajador</th>
					    	<th>Nombre</th>
				        <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Clave presupuestal</th>

				         </tr>
					  </thead>
					  <tbody>

					  	<?php
				        	foreach($results as $rs) {
				        ?>
					    <tr>

					    <td><?php echo $rs['RFC_trabajador']?></td>
							<td><?php echo $rs['Nombre_trabajador']?></td>
              <td><?php echo $rs['Apellido_p_trabajador']?></td>
              <td><?php echo $rs['Apellido_m_trabajador']?></td>
              <td><?php echo $rs['clave_presupuestal']?></td>
					    </tr>
					    <?php
				          	}
				        ?>
					</tbody>
					</table>
				</div>
			</div>
    </div>

			<div class="col s10">
                <footer class="page-footer red accent-6">
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
        <script type="text/javascript" src="../jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="../js/materialize.min.js"></script>
        <script>
          $(document).ready(function() {
        $('select').material_select();
        });
        </script>
	</body>
</html>
