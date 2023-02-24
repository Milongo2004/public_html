<?php 
// el presente archivo crea la lista de empaque digitando el lote y seleccionando el número de juegos según sea
$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
require_once("herramienta_introducir_datos.php");
$lote=$_GET ["lote"];
$codigoQR=$_GET ["codigoQR"];
$juegos=$_GET ["juegos"];

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

$sql1= "SELECT * FROM `codificacionQR` WHERE referencia = '". $codigoQR. "'";
$result1=mysqli_query($conexion,$sql1);       

     
                while($mostrar1=mysqli_fetch_array($result1)){
                    $ref=$mostrar1['ref'];
                    $supInf=$mostrar1['supInf'];
                    $color=$mostrar1['SubGrupo'];
                    $antPos=$mostrar1['antPos']; 
                    $linea=$mostrar1["NombreLinea"];
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



?>