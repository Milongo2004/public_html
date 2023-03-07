<?php

$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

$id=$_POST['id'];
$codRotulo=$_POST['cod_rotulo'];
$fecha=$_POST['fecha'];
$prensada=$_POST['prensada'];
$referencia=$_POST['referencia'];
$lote=$_POST['lote'];
$color=$_POST['color'];
$Moldes=$_POST['moldes'];
$turno=$_POST['turno'];
$juegos=$_POST['juegos'];
$estacion=$_POST['estacion'];
$vuelta1=$_POST['vuelta1'];
$vuelta2=$_POST['vuelta2'];
$vuelta3=$_POST['vuelta3'];
$vuelta4=$_POST['vuelta4'];
$vuelta5=$_POST['vuelta5'];
$vuelta6=$_POST['vuelta6'];
$vuelta7=$_POST['vuelta7'];
$vuelta8=$_POST['vuelta8'];
$total=$_POST['total'];
$pedido=$_POST['pedido'];
$casilla=$_POST['casilla'];
$fcreacion=$_POST['fechacreacion'];
$factualizar=$_POST['fechactualizacion'];
$estado=$_POST['estado'];



$sql_update = mysqli_query($conexion,  "UPDATE rotulos2  SET cod_rotulo='$codRotulo' , fecha='$fecha', prensada='$prensada',referenciaId='$referencia',loteId='$lote',pedido='$pedido',colorId='$color',cantidadMoldes='$Moldes',casillaId='$casilla', turno='$turno',juegos='$juegos',estacionId2='$estacion',vuelta1='$vuelta1',vuelta2='$vuelta2',vuelta3='$vuelta3',vuelta4='$vuelta4',vuelta5='$vuelta5',vuelta6='$vuelta6',vuelta7='$vuelta7',vuelta8='$vuelta8',total='$total', fechaCreacion='$fcreacion', fechaActualizacion='$factualizar', estado='$estado' WHERE id=$id");


if($sql_update){
  
  $query=mysqli_query($conexion,"SELECT rotulos2.id AS idrot, colores2.nombre AS color, lotes2.*,referencias2.nombre AS referencia, pedidos2.* FROM rotulos2 INNER JOIN colores2 ON rotulos2.`colorId` = colores2.`id`  INNER JOIN lotes2  ON rotulos2.`loteId`=lotes2.`id` INNER JOIN referencias2 ON rotulos2.`referenciaId`=referencias2.`id` INNER JOIN pedidos2 ON rotulos2.`pedido`=pedidos2.`idP` WHERE colores2.id LIKE '$color' AND   lotes2.id LIKE '$lote'  AND referencias2.id  LIKE '$referencia' AND pedidos2.idP LIKE'$pedido'");
  mysqli_close($conexion);
  $resultado = mysqli_num_rows($query);
  if ($resultado > 0) {
  while  ($data = mysqli_fetch_assoc($query)) {
    $idrot=$data['idrot'];
  $color=$data['color'];
  $referencia=$data['referencia'];
  $lote=$data['nombreL'];
  $pedido=$data['codigoP'];
  }}
  
  echo "<script>
  alert('LOS DATOS SE HAN EDITADO DE FORMA CORRECTA');
  window.location= 'consultar4.php?color=$color&referencia=$referencia&lote=$lote&pedido=$pedido&fecha=$fecha';
  </script>";

}
  else {
  echo "HAY UN ERROR CON LOS DATOS, INTENTA DE NUEVO";
  }


?>
