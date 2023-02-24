<?php 
$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

$id=$_POST['id'];
$codigo=$_POST['codigo'];
$cantidad=$_POST['cantidad'];

$query=mysqli_query($conexion,"SELECT * FROM producto_lab WHERE Referencia_codigo LIKE '%$codigo%'");
$resultado = mysqli_num_rows($query);

if ($resultado > 0) {
    while($mostrar2=mysqli_fetch_array($query)){
        $idcodigo=$mostrar2['id'];
        
    }

$sql_update = mysqli_query($conexion,  "UPDATE inventario_lab  SET productoId='$idcodigo', cantidad='$cantidad' WHERE id=$id");
mysqli_close($conexion);

if($sql_update){


  echo "<script>
  window.location= 'seleccion_inventario.php';
  </script>";

}
  else {
  echo "HAY UN ERROR CON LOS DATOS, INTENTA DE NUEVO";
  }
}
else {
  
  echo "<script>
  window.location= 'seleccion_inventario.php';
  alert('EL CODIGO NO EXISTE');
  </script>";
}


?>

