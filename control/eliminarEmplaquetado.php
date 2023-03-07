<?php

$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

$id = $_GET['id'];


//elimina el detalle

$sql = "DELETE FROM `seguimientoEmplaquetado` WHERE id = ' ".$id."'";

$resultado = mysqli_query($conexion, $sql);


?>

	<html lang="en">
			    <body>
			        
			<!--<button onclick="location.href='https://trazabilidadmasterdent.online/control/formulario_pedidos.php'">Nuevo Registro</button>
			<button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>-->
			<meta http-equiv="refresh" content="0.3; url= https://trazabilidadmasterdent.online/control/formularioEmplaquetado.php">
	
</body>
</html>
