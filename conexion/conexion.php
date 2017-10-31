<?php

$dsn = 'mysql:dbname=solicitud_actividad;host=localhost';
$user = 'complementarias';
$password = '0ZCYWbQnbeDqSi3Y';

try{

   $pdo = new PDO( $dsn,
		   $user,
		   $password
		   );

}catch( PDOException $e ){
     echo 'Error al conectarnos: ' . $e->getMessage();
}
?>
