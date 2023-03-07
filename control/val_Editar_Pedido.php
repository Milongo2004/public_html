<?php

$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");


$idP=$_POST['idP'];
$codigoP=$_POST['codigoP'];
//$idCliente=$_POST['idCliente'];
//$juegosTotales=$_POST['juegosTotales'];
//$categoriaP=$_POST['categoriaP'];
//$fechaCreacion=$_POST['fechaCreacion'];
//$fechaActualizacion=$_POST['fechaActualizacion'];
//$estado=$_POST['estado'];
$linea=$_POST['linea'];
$nota=$_POST['nota'];

$sql_update = mysqli_query($conexion,  "UPDATE pedidos2 SET codigoP='$codigoP', nota= '$nota', linea='$linea' WHERE idP=$idP");
mysqli_close($conexion);

if($sql_update){





  echo "<script>
  alert('LOS DATOS SE HAN EDITADO DE FORMA CORRECTA');
  window.location= 'https://trazabilidadmasterdent.online/control/vistas/modulos/verTablaPedidos.php' 
  </script>";

}
  else {
  echo "HAY UN ERROR CON LOS DATOS, INTENTA DE NUEVO";
  }



?>


