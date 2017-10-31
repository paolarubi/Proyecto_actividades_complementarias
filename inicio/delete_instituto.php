<?php
require_once('../conexion/conexion.php');
$Clave_instituto = isset($_GET['Clave_instituto']) ? $_GET['Clave_instituto'] : 0 ;

$sql = 'DELETE FROM instituto WHERE Clave_instituto = ?';

$statement = $pdo->prepare($sql);
$statement->execute(array($Clave_instituto));

$results = $statement->fetchAll();
header('Location: Modificar_instituto.php');
?>
