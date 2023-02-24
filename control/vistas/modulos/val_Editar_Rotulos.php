<?php
$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");



$id=$_POST['id'];
$codRotulo=$_POST['codigoRotulo'];
$fecha=$_POST['fecha'];
$prensada=$_POST['prensada'];
$cantMoldes=$_POST['cantMoldes'];
$turno=$_POST['turno'];
$pedido=$_POST['pedido'];
$referencia=$_POST['referencia'];
$color=$_POST['color'];
$lote=$_POST['lote'];
$Moldes=$_POST['Moldes'];
$casillaId=$_POST['casillaId'];
$juegos=$_POST['juegos'];
$estacionActual=$_POST['estacionActual'];
$vuelta1=$_POST['vuelta1'];
$vuelta2=$_POST['vuelta2'];
$vuelta3=$_POST['vuelta3'];
$vuelta4=$_POST['vuelta4'];
$vuelta5=$_POST['vuelta5'];
$vuelta6=$_POST['vuelta6'];
$vuelta7=$_POST['vuelta7'];
$vuelta8=$_POST['vuelta8'];
$total=$_POST['total'];
$fechaCreacion=$_POST['fechaCreacion'];
$fechaActualizacion=$_POST['fechaActualizacion'];
$estado=$_POST['estado'];



$sql_update = mysqli_query($conexion,  "UPDATE rotulos2 SET cod_rotulo='$codRotulo' , fecha='$fecha', prensada='$prensada',referenciaId='$referencia',loteId='$lote',pedido='$pedido',colorId='$color',pedido='$pedido',cantidadMoldes='$cantMoldes',casillaId='$casillaId', turno='$turno',juegos='$juegos',estacionId2='$estacionActual',vuelta1='$vuelta1',vuelta2='$vuelta2',vuelta3='$vuelta3',vuelta4='$vuelta4',vuelta5='$vuelta5',vuelta6='$vuelta6',vuelta7='$vuelta7',vuelta8='$vuelta8',total='$total',fechaCreacion='$fechaCreacion',fechaActualizacion='$fechaActualizacion',estado='$estado' WHERE id=$id");
mysqli_close($conexion);

if($sql_update){





  echo "<script>
  alert('LOS DATOS SE HAN EDITADO DE FORMA CORRECTA');
  window.location='verTablaRotulos.php' 
  </script>";

}
  else {
  echo "HAY UN ERROR  AL ACTUALIZAR LOS DATOS ,POR FAVOR INTENTA DE NUEVO";
  }



?>
