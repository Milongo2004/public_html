<?php 
require_once("herramienta_introducir_datos.php");

$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

$emplaquetador=$_GET ["emplaquetador"];
$cod_rotulo=$_GET["rotulo"];
$cajas=$_GET ["cajas"];
$juegos=0;

$sqlR="SELECT referenciaId, colorId, pedido,total, referencias2.gramosJuego AS gramosJuego, referencias2.tipo AS tipo, pedidos2.linea AS linea FROM rotulos2 INNER JOIN referencias2 ON rotulos2.referenciaId = referencias2.id INNER JOIN pedidos2 ON rotulos2.pedido = pedidos2.idP WHERE rotulos2.id = '".$cod_rotulo. "';";

$resultR=mysqli_query($conexion,$sqlR);

while($mostrarR=mysqli_fetch_array($resultR)){
                    
                    $referenciaId=$mostrarR['referenciaId']; 
                    $pedidoId=$mostrarR['pedido']; 
                    $colorId=$mostrarR['colorId']; 
                    $juegosIngresan=$mostrarR['total'];
                    $gramosJuego=$mostrarR['gramosJuego'];
                    $tipo=$mostrarR['tipo'];
                    $linea=$mostrarR['linea'];
                    //$gramosGranel=$mostrarR['gramosGranel'];
                    //$juegosGranel=$gramosGranel/$gramosJuego;
                    //$juegosGranel=round($juegosGranel);
                    
}



  if ($linea=='RESISTAL' || $linea=='ZENITH'){
                    
                    if ($tipo=='Diente'){
                        $juegosCaja=16;
                    }
                    else if ($tipo=='Muela'){
                        $juegosCaja=14;
                    }
                    else{
                        echo "error: seleccione el tipo : diente/muela";
                    }
                }
                else if ($linea=='REVEAL' || $linea=='STARDENT' || $linea=='STARVIT'){
                    $juegosCaja=20;
                }
                else if ($linea=='UHLERPLUS' || $linea=='STARPLUS'){
                    $juegosCaja=12;
                    
                }
                else{
                    $juegosCaja=20;//pendiente de verificar. 
                }
                
$juegos=$cajas*$juegosCaja;

if ($linea=='UHLERPLUS' || $linea=='STARPLUS'){
    $puntos=$juegos*1.2;
    
}
else{
    $puntos=$juegos;
}

//echo $emplaquetador ."/";
//echo $linea ."/";
//echo $tipo ."/";
//echo $cajas ."/" ;
//echo $juegos ."/" ;

$sqlCalidad="INSERT INTO `pedidoDetalles` (`id`, `pedidoId`, `referenciaId`, `colorId`, `rotuloId`, `juegos`, `granel`, `programados`, `producidos`, `pulidos`, `enSeparacion`, `separado`, `enEmplaquetado`, `emplaquetados`, `revision1`, `revision2`, `empacados`, `calidad`, `colaborador`, `fechaCreacion`) VALUES (NULL, '$pedidoId', '$referenciaId', '$colorId', '$cod_rotulo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$juegos', NULL, NULL, NULL, NULL, '$emplaquetador', (select DATE_SUB(NOW(),INTERVAL 5 HOUR)));";
    
    $resultCalidad=mysqli_query($conexion,$sqlCalidad);


$herramientaEmplaquetado = new Herramienta();
$ingresar_dato_tabla_SeguimientoEmplaquetado = $herramientaEmplaquetado->ingresar_datos_seguimientoEmplaquetado($emplaquetador, $linea, $tipo,$juegos, $puntos);
//
?>