<?php
require_once('../conexion/conexion.php');
$Num_control = isset($_GET['Num_control']) ? $_GET['Num_control'] : 0 ;

$sql = 'DELETE FROM estudiante WHERE Num_control = ?';

$statement = $pdo->prepare($sql);
$statement->execute(array($Num_control));

$results = $statement->fetchAll();
header('Location: Modificar_estudiante.php');
?>
