<?php
$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");



$id=$_POST['id'];
$mold=$_POST['mold'];
$antpos=$_POST['antpos'];
$upplow=$_POST['upplow'];
$shade=$_POST['shade'];
$lote=$_POST['lote'];
$pedido=$_POST['pedido'];

$sql_update = mysqli_query($conexion,  "UPDATE listaEmpaque  SET mold='$mold', antPos='$antpos' ,   uppLow='$upplow',  shade='$shade',  lote='$lote',  pedidoId='$pedido'  WHERE id=$id");
mysqli_close($conexion);

if($sql_update){





  echo "<script>
  alert('LOS DATOS SE HAN EDITADO DE FORMA CORRECTA');
  window.location= 'consultar4.php?color=$shade&referencia=$mold&lote=$lote&pedido=$pedido';
  </script>";

}
  else {
  echo "HAY UN ERROR CON LOS DATOS, INTENTA DE NUEVO";
  }



?>
