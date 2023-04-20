<?php


$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
//require_once("herramienta_introducir_datos.php");

    $rotuloId=$_GET ["rotuloId"];

    $referenciaId=$_GET ['referenciaId'];
    $colorId=$_GET ['colorId'];
    $pedidoId=$_GET ['idP'];

    $juegosGranel=0;
echo "pedidoId=". $pedidoId. "-rotuloId=". $rotuloId. "-referenciaId=".$referenciaId."-colorId=".$colorId;

$sqlActualizaPedido = "UPDATE rotulos2 SET pedido='".$pedidoId."' WHERE id ='".$rotuloId."'";
 
 $resultActualizaPedido=mysqli_query($conexion,$sqlActualizaPedido);
 
 //Consulto los gramos a granel que hay de este rótulo, desúes consulto por la referencia la equivalencia en juegos y luego creo el registro en detalles. 
 
 $sqlGramosGranel = "SELECT gramos FROM `productoGranel` WHERE rotuloId ='".$rotuloId."'";
 
 $resultGramosGranel=mysqli_query($conexion,$sqlGramosGranel);
 
  while($mostrarGramosGranel=mysqli_fetch_array($resultGramosGranel)){
            $gramosGranel=$mostrarGramosGranel['gramos'];
            }
            
    $sqlGramosJuego="SELECT gramosJuego FROM `referencias2` WHERE id ='".$referenciaId."'";
    
    $resultGramosJuego=mysqli_query($conexion,$sqlGramosJuego);
    
    while($mostrarGramosJuego=mysqli_fetch_array($resultGramosJuego)){
        $gramosJuego=$mostrarGramosJuego['gramosJuego'];
    }
 $juegosGranel=$gramosGranel/$gramosJuego;
 
 $sqlAsignaGranel="INSERT INTO `pedidoDetalles` (`id`, `pedidoId`, `referenciaId`, `colorId`, `rotuloId`, `juegos`, `granel`, `programados`, `producidos`, `pulidos`, `enSeparacion`, `separado`, `enEmplaquetado`, `emplaquetados`, `revision1`, `revision2`, `empacados`, `calidad`, `colaborador`, `fechaCreacion`) VALUES (NULL, '$pedidoId', '$referenciaId', '$colorId', '$rotuloId', NULL, '$juegosGranel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, (select DATE_SUB(NOW(),INTERVAL 5 HOUR)));";
    
    $resultAsignaGranel=mysqli_query($conexion,$sqlAsignaGranel);
/*
// lo siguiente es para regresar a la página de granel con toda la información requerida

<td><a href="../control/vistas/modulos/verTablaGranel.php?idP=<?php echo $pedidoId; ?>&referenciaId=<?php echo $referenciaId ?>&colorId=<?php echo $colorId ?>&Crear=Enviar'" >verGranel</a></td>
*/
?>

	<html lang="en">
			    <head>
			    <meta http-equiv="refresh" content="0.2; url= https://trazabilidadmasterdent.online/control/vistas/modulos/verTablaGranel.php?idP=<?php echo $pedidoId; ?>&referenciaId=<?php echo $referenciaId ?>&colorId=<?php echo $colorId ?>">
			    </head>
<body>
<p align="left">¡Registro Exitoso!</p>
</body>