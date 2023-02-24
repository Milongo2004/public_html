<?php

 $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

$id = $_GET['id'];

$sql = "DELETE FROM temperaturaPrensas WHERE id = ' ".$id."'";

$resultado = mysqli_query($conexion, $sql);
?>