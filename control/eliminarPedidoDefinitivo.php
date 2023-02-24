<?php

$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");



$id=$_GET["id"];


$borrar=mysqli_query($conexion,"DELETE  FROM pedidos2 WHERE  idP='$id' ");
mysqli_close($conexion);
 


echo "<script>
alert('LOS DATOS  HAN SIDO BORRADOS PERMANENTEMENTE Y NO PODRAS  RECUPERARLOS');
window.location= 'https://trazabilidadmasterdent.online/control/vistas/modulos/verTablaPedidos.php';
</script>";


?>



