<?php

$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");


$idP=$_POST['idP'];
$codigoP=$_POST['codigoP'];
$idCliente=$_POST['idCliente'];
$juegosTotales=$_POST['juegosTotales'];
$categoriaP=$_POST['categoriaP'];
$fechaCreacion=$_POST['fechaCreacion'];
$fechaActualizacion=$_POST['fechaActualizacion'];
$estado=$_POST['estado'];

$sql_update = mysqli_query($conexion,  "UPDATE pedidos2 SET codigoP='$codigoP', idCliente='$idCliente' ,   juegosTotales='$juegosTotales',  categoriaP='$categoriaP',  fechaCreacion='$fechaCreacion',  fechaActualizacion='$fechaActualizacion', estado='$estado' WHERE idP=$idP");
mysqli_close($conexion);

if($sql_update){





  echo "<script>
  alert('LOS DATOS SE HAN EDITADO DE FORMA CORRECTA');
  window.location= 'https://trazabilidadmasterdent.online/control/formulario_pedidos.php' 
  </script>";

}
  else {
  echo "HAY UN ERROR CON LOS DATOS, INTENTA DE NUEVO";
  }



?>


