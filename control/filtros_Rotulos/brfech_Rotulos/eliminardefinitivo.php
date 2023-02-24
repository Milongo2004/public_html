<?php
$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");




$id=$_GET["id"];
$desde=$_GET["desde"];
$hasta=$_GET["hasta"];
$color=$_GET["color"];
$referencia=$_GET["referencia"];
$lote=$_GET["lote"];
$pedido=$_GET["pedido"];





$borrar=mysqli_query($conexion,"DELETE  FROm rotulos2 WHERE  id='$id' ");
mysqli_close($conexion);

echo "<script>
alert('LOS DATOS  HAN SIDO BORRADOS PERMANENTEMENTE Y NO PODRAS  RECUPERARLOS');
window.location= 'consultarcolor.php?color=$color&referencia=$referencia&lote=$lote&pedido=$pedido&desde=$desde&hasta=$hasta';
</script>";



?>
