<?php
print_r($_GET);
$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");



$id=$_GET["id"];


$borrar=mysqli_query($conexion,"DELETE  FROM lotes2 WHERE  id='$id '");
mysqli_close($conexion);
 


echo "<script>
alert('LOS DATOS  HAN SIDO BORRADOS PERMANENTEMENTE Y NO PODRAS  RECUPERARLOS');
window.location='https://trazabilidadmasterdent.online/control/formulario_lotes.php';
</script>";


?>