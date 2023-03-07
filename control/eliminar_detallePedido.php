<?php

$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

$id = $_GET['id'];
$pedidoId=$_GET ["pedidoId"];

//elimina el detalle

$sql = "DELETE FROM `pedidoDetalles` WHERE id = ' ".$id."'";

$resultado = mysqli_query($conexion, $sql);

//actualizo el total de los juegos en pedidos2.

  $sql_juegos = "UPDATE pedidos2 SET pedidos2.`juegosTotales`= (select sum(juegos) as totales FROM pedidoDetalles WHERE pedidoDetalles.`pedidoId` = '". $pedidoId. "') WHERE idP= '".$pedidoId."'";
	$resultadoJuegos = mysqli_query($conexion, $sql_juegos);

?>

	<html lang="en">
			    <body>
			        
			<!--<button onclick="location.href='https://trazabilidadmasterdent.online/control/formulario_pedidos.php'">Nuevo Registro</button>
			<button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>-->
			<meta http-equiv="refresh" content="0.3; url= https://trazabilidadmasterdent.online/control/pedidoDetalles.php?pedidoId=<?php echo $pedidoId?>&Empacar=Enviar">
	
</body>
</html>
