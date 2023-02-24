<?php


$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

$id=$_POST['id'];
$rotulo=$_POST['rotulo'];
$moldId=$_POST['moldId'];
$fechaCreacion=$_POST['fechaCreacion'];
$fechaActualizacion=$_POST['fechaActualizacion'];
$estado=$_POST['estado'];

$sql_update = mysqli_query($conexion,  "UPDATE asignaciones2 SET rotuloId='$rotulo', moldeId='$moldId', fechaCreacion='$fechaCreacion',  fechaActualizacion='$fechaActualizacion', estado='$estado' WHERE id=$id");
mysqli_close($conexion);

if($sql_update){





  echo "<script>
  alert('LOS DATOS SE HAN EDITADO DE FORMA CORRECTA');
  window.location='https://trazabilidadmasterdent.online/control/index.php?action=asignaciones' 
  </script>";

}
  else {
  echo "HAY UN ERROR AL ACTUALIZAR LOS DATOS,POR FAVOR  INTENTA DE NUEVO";
  }



?>