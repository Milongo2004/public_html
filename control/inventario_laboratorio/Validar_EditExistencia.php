<?php 

$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

$id=$_POST['id'];
$Existencia=$_POST['Existencia'];
$Fecha=$_POST['Fecha'];
$cantidad=$_POST['cantidad'];
$Diferencia=$Existencia-$cantidad;

echo $fecha;
$sql_update = mysqli_query($conexion,  "UPDATE inventario_lab  SET cantidad = '$cantidad', Existencia='$Existencia', Diferencia='$Diferencia' WHERE id=$id");
mysqli_close($conexion);

if($sql_update){

  echo "<script>
  
  window.location='https://trazabilidadmasterdent.online/control/PDL/consultar_inventario.php?fecha=$Fecha';
  </script>";

}
  else {
  echo "HAY UN ERROR CON LOS DATOS, INTENTA DE NUEVO";
  }



?>

