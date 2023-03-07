<?php

$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");




$id=$_GET["id"];





$borrar=mysqli_query($conexion,"DELETE  FROM inventario_lab WHERE  id='$id' ");
mysqli_close($conexion);

echo "<script>
window.location= 'seleccion_inventario.php';
</script>";



?>


