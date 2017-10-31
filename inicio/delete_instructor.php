<?php
require_once('../conexion/conexion.php');
$RFC_instructor = isset($_GET['RFC_instructor']) ? $_GET['RFC_instructor'] : 0 ;

$sql = 'DELETE FROM instructor WHERE RFC_instructor = ?';

$statement = $pdo->prepare($sql);
$statement->execute(array($RFC_instructor));

$results = $statement->fetchAll();
header('Location: Modificar_instructor.php');
?>
