<?php
$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");



$id=$_POST['id'];
$codRotulo=$_POST['codigoRotulo'];
$fecha=$_POST['fecha'];
$prensada=$_POST['prensada'];
$cantMoldes=$_POST['cantMoldes'];
$juegosRotulo="";
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
$nota=$_POST['nota'];

$fecha2=$_POST ["fecha"];
$turno2=$_POST ["turno"];
$prensada2=$_POST ["prensada"];
        
        //obtengo los juegos de la referencia y los moldes totales que hay de la referencia.


$sql3= "SELECT * FROM referencias2 WHERE id = '". $referencia. "'";

        $result3=mysqli_query($conexion,$sql3);

     
                while($mostrar3=mysqli_fetch_array($result3)){
                    $juegosReferencia=$mostrar3['juegos'];  
                    $moldesTotales=$mostrar3['totalMoldes'];
                    //$moldesEnUso=$mostrar3['moldesEnUso'];
                    $juegosRotulo=$juegosReferencia*$cantMoldes;     
                    $juegosTotales=$juegosRotulo*8;
  
             
            }
        
        


//$sql_update = mysqli_query($conexion,  "UPDATE rotulos2 SET cod_rotulo='$codRotulo' , fecha='$fecha', prensada='$prensada',referenciaId='$referencia',loteId='$lote',pedido='$pedido',colorId='$color',pedido='$pedido',cantidadMoldes='$cantMoldes',casillaId='$casillaId', turno='$turno',juegos='$juegos',estacionId2='$estacionActual',vuelta1='$vuelta1',vuelta2='$vuelta2',vuelta3='$vuelta3',vuelta4='$vuelta4',vuelta5='$vuelta5',vuelta6='$vuelta6',vuelta7='$vuelta7',vuelta8='$vuelta8',total='$total',fechaCreacion='$fechaCreacion',fechaActualizacion='$fechaActualizacion',estado='$estado',nota='$nota' WHERE id=$id");
$sql_update = mysqli_query($conexion,  "UPDATE rotulos2 SET cod_rotulo='$codRotulo' , fecha='$fecha', prensada='$prensada',referenciaId='$referencia',loteId='$lote',pedido='$pedido',colorId='$color',pedido='$pedido',cantidadMoldes='$cantMoldes',casillaId='$casillaId', turno='$turno',juegos='$juegosRotulo',estacionId2='$estacionActual',vuelta1='$juegosRotulo',vuelta2='$juegosRotulo',vuelta3='$juegosRotulo',vuelta4='$juegosRotulo',vuelta5='$juegosRotulo',vuelta6='$juegosRotulo',vuelta7='$juegosRotulo',vuelta8='$juegosRotulo',total='$juegosTotales',fechaCreacion='$fechaCreacion',fechaActualizacion='$fechaActualizacion',estado='$estado',nota='$nota' WHERE id='$id';");

$sqlActualizaDetalles= mysqli_query($conexion, "UPDATE pedidoDetalles SET  programados= '$juegosTotales' WHERE rotuloId = '$id' AND id= (SELECT id FROM pedidoDetalles WHERE rotuloId = '$id' ORDER BY id DESC LIMIT 1);");
//UPDATE `pedidoDetalles` SET `programados`= '48' WHERE `rotuloId` = '10152' AND `id`= (SELECT `id` FROM `pedidoDetalles` WHERE `rotuloId` = '10152' ORDER BY `id` DESC LIMIT 1);


mysqli_close($conexion);

if($sql_update){

//registro el detalle en la tabla pedidoDetalles




  echo "<script>
  alert('LOS DATOS SE HAN EDITADO DE FORMA CORRECTA');
  
  window.location='progProduccion3.php?fecha=$fecha&turno=$turno&prensada=$prensada' 
  </script>";

}
  else {
  echo "HAY UN ERROR  AL ACTUALIZAR LOS DATOS ,POR FAVOR INTENTA DE NUEVO";
  }



?>
