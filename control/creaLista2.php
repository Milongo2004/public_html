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
$herramienta21 = new Herramienta();
$ingresar_datos_listaEmpaque = $herramienta21->ingresar_datos_listaEmpaque_digitandoLote($ref, $antPos, $supInf, $color, $lote, $juegos, $codigoQR, $pedido, $caja, $metodo);
}
//CONDICION PARA EL INGRESO GRUPAL
else {
    $cajas=$_GET ["cajas"];
    $juegos=$juegos*$cajas;
    
    $herramienta21 = new Herramienta();
$ingresar_datos_listaEmpaque = $herramienta21->ingresar_datos_listaEmpaque_digitandoLote($ref, $antPos, $supInf, $color, $lote, $juegos, $codigoQR, $pedido, $caja, $metodo);
    
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

?>