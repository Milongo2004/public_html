<?php 
// el presente archivo crea la lista de empaque digitando el lote
$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
require_once("herramienta_introducir_datos.php");
$lote=$_GET ["lote"];
if(is_null($lote)){
    $lote="";
}
$codigoQR=$_GET ["codigoQR"];
//$juegos=$_GET ["juegos"];
$juegos=0;
$linea="";
$ref="";//ref
$supInf="";//supInf
$color="";//SubGrupo
$antPos="";//antPos

$cajas="";//la declaro y luego si el valor obtenido del formulario  es != de null utilizo la herramienta 21 con los juegos ingresados sino, calculo el valor de los juegos como la multiplicación de las cajas por el numero de juegos y creo un registro grupal como si fuera una caja uno a uno utilizando la misma herramienta.
$caja=$_GET ["caja"];
$pedido=$_GET ["pedido"];
$metodo=$_GET ["metodo"];

$lineaPedido="";

$ahora = date("H:i:s");
$caja1hora1="11:00:00";
$caja1hora2="12:59:50";

$caja2hora1="13:00:00";
$caja2hora2="14:59:50";

$caja3hora1="15:00:00";
$caja3hora2="16:59:50";

$caja4hora1="17:00:00";
$caja4hora2="18:59:50";

$caja5hora1="19:00:00";
$caja5hora2="10:59:50";

//consulto la línea según el pedido para comparar con la línea del QR

       $sql2= "SELECT linea from pedidos2 WHERE idP ='". $pedido. "'";
        $result2=mysqli_query($conexion,$sql2);
                while($mostrar2=mysqli_fetch_array($result2)){
                
                $lineaPedido=$mostrar2['linea'];
                
                }

//obtengo mediante consultas los datos necesarios de la TABLA16, de donde puedo obtener 

$sql1= "SELECT * FROM `codificacionQR` WHERE Referencia = '". $codigoQR. "'";
$result1=mysqli_query($conexion,$sql1);       

     
                while($mostrar1=mysqli_fetch_array($result1)){
                    $ref=$mostrar1['ref'];
                    $supInf=$mostrar1['supInf'];
                    $color=$mostrar1['SubGrupo'];
                    $antPos=$mostrar1['antPos']; 
                    $linea=$mostrar1["NombreLinea"];
            }
 

                
                //obtengo el dato de los juegos según la línea y el atributo antPos.
                
                if ($linea==$lineaPedido || $lineaPedido=="NACIONAL"){
                   /* 
                    if(($ahora>$caja1hora1 && $ahora<$caja1hora2 && $caja=="1")||($ahora>$caja2hora1 && $ahora<$caja2hora2 && $caja=="2")||($ahora>$caja3hora1 && $ahora<$caja3hora2 && $caja=="3")||($ahora>$caja4hora1 && $ahora<$caja4hora2 && $caja=="4")||($ahora>$caja5hora1 && $ahora<$caja5hora2 && $caja=="5")){
                    */
                
                if ($linea=='RESISTAL' || $linea=='ZENITH'){
                    
                    if ($antPos=='ANT'){
                        $juegos=16;
                    }
                    else if ($antPos=='POS' || $antPos=='POST'){
                        $juegos=14;
                    }
                }
                else if ($linea=='REVEAL' || $linea=='STARDENT' || $linea=='STARVIT'){
                    $juegos=20;
                }
                else if ($linea=='UHLERPLUS' || $linea=='STARPLUS'){
                    $juegos=12;
                    $color=trim($color);
                    $color=$color." PLUS";
                }
               
                
                //confirmo si se está haciendo un ingreso uno a uno o un ingreso grupal.

//CONDICION PARA EL INGRESO UNO A UNO 
if (($_GET ["cajas"])=="null"){
    $cajas="1";
$herramienta21 = new Herramienta();
$ingresar_datos_listaEmpaque = $herramienta21->ingresar_datos_listaEmpaque_digitandoLote($ref, $antPos, $supInf, $color, $lote, $juegos, $cajas, $codigoQR, $pedido, $caja, $metodo);
}
//CONDICION PARA EL INGRESO GRUPAL
else {
    $cajas=$_GET ["cajas"];
    $juegos=$juegos*$cajas;
    
    $herramienta21 = new Herramienta();
$ingresar_datos_listaEmpaque = $herramienta21->ingresar_datos_listaEmpaque_digitandoLote($ref, $antPos, $supInf, $color, $lote, $juegos, $cajas, $codigoQR, $pedido, $caja, $metodo);
    
}

	    //preparo el supInf para concatenar con la referencia
		   $supInf=substr($supInf,0,1);
		   $ref=$ref."-".$supInf;
		   
		    //consulto la referencia
		    $sqlRefId="SELECT id FROM `referencias2` WHERE nombre='".$ref."'";
		    $resultRefId= mysqli_query($conexion,$sqlRefId);
		    
		    while($mostrarRefId=mysqli_fetch_array($resultRefId)){
			    
                $refId=$mostrarRefId['id'];
                //echo "id de la referencia= ".$refId;
                
            }
            
            //consulto el color
		    $sqlColorId="SELECT id FROM `colores2` WHERE nombre='".$color."'";
		    $resultColorId= mysqli_query($conexion,$sqlColorId);
		    
		    while($mostrarColorId=mysqli_fetch_array($resultColorId)){
			    
                $colorId=$mostrarColorId['id'];
                
                //echo "id de la color= ".$colorId;
               
                
            }
		    //luego de consultar el id de la referencia, ingreso los datos a la tabla de detalles.
		    
		    $sql_Detalles1 = "INSERT INTO `pedidoDetalles` (`id`, `pedidoId`, `referenciaId`, `colorId`, `rotuloId`, `juegos`, `granel`, `programados`, `producidos`, `pulidos`, `enSeparacion`, `separado`, `enEmplaquetado`, `emplaquetados`, `revision1`, `revision2`, `empacados`, `calidad`, `colaborador`, `fechaCreacion`) values (NULL,'".$pedido."','".$refId."','".$colorId."',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'".$juegos."',NULL,NULL,(select DATE_SUB(NOW(),INTERVAL 5 HOUR)))";
		    
		     $resultDetalles1 = mysqli_query($conexion,$sql_Detalles1);
               /* }
                else {
                    echo "debe seleccionar la caja correspondiente a la hora actual";
                }*/
                }
                else {
                    ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Error</title>
</head>
<body>
    <center>
	<h1>
                    <?php
                    //echo "¡ERROR!".$ahora;
                    echo "¡ERROR!";
                    echo "</br>";
                    /*
                    if ($ahora>'20:41:00'){
                        echo "debe ingresar en la caja 5";
                    }
                    else{
                        echo "debe ingresar en la caja 4";
                    }
                    */
                    echo "</br>";
                    echo "LAS LÍNEAS NO CORRESPONDEN";
                    echo "</br>";
                    echo "</br>";
                    echo "</br>";
                    echo "línea del inventario = ".$lineaPedido;
                    echo "</br>";
                    echo "línea QR = ".$linea;
                    
                    
                }

?>

</h1>


	  </center>
</body>
</html>