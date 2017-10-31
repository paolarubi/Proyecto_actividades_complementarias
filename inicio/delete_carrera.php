<?php
require_once('../conexion/conexion.php');
$Clave_carrera = isset($_GET['Clave_carrera']) ? $_GET['Clave_carrera'] : 0 ;

$sql = 'DELETE FROM carrera WHERE Clave_carrera = ?';

$statement = $pdo->prepare($sql);
$statement->execute(array($Clave_carrera));

$results = $statement->fetchAll();
header('Location: Modificar_carrera.php');
?>
