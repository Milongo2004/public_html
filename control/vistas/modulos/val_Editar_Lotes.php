<?php
$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");




$id=$_POST['id'];
$nombreL=$_POST['nombreL'];
$colorId2=$_POST['colorId2'];
$fechaCreacion=$_POST['fechaCreacion'];
$fechaActualizacion=$_POST['fechaActualizacion'];
$estado=$_POST['estado'];

$sql_update = mysqli_query($conexion,  "UPDATE lotes2 SET nombreL='$nombreL', colorId2='$colorId2' , fechaCreacion='$fechaCreacion',  fechaActualizacion='$fechaActualizacion', estado='$estado' WHERE id=$id");
mysqli_close($conexion);

if($sql_update){





  echo "<script>
  alert('LOS DATOS SE HAN EDITADO DE FORMA CORRECTA');
  window.location='https://trazabilidadmasterdent.online/control/formulario_lotes.php' 
  </script>";

}
  else {
  echo "HAY UN ERROR CON LOS DATOS, INTENTA DE NUEVO";
  }



?>
