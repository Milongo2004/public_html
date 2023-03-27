<?php 
// el presente archivo crea la lista de empaque digitando el lote
$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

require_once("herramienta_introducir_datos.php");

$lote=$_GET ["lote"];
$codigoQR="";

$juegos=$_GET ["juegos"];
//$linea=$_GET [""];;
$ref=$_GET ["ref"];//ref
//$supInf=$_GET ["supInf"];//supInf
$color=$_GET ["color"];//SubGrupo
//$antPos=$_GET ["antPos"];//antPos

$cajas="";//la declaro y luego si el valor obtenido del formulario  es != de null utilizo la herramienta 21 con los juegos ingresados sino, calculo el valor de los juegos como la multiplicación de las cajas por el numero de juegos y creo un registro grupal como si fuera una caja uno a uno utilizando la misma herramienta.
$caja=$_GET ["caja"];
$pedido=$_GET ["pedido"];
$metodo=$_GET ["metodo"];
                
                //como los datos de referencia y color obtenidos del ingreso manual son id, debo buscar su equivalencia en nombre para subir a la tabla listaEmpaque.
                
                //defino las variables a buscar en su tabla correspondiente.
                
                $referencia="";
                $colorin="";
                $supInf="";
                $tipo="";
                $antPos="";
                $ultimoRef="";
                // busco el nombre de la referencia según su id en la tabla referencias2
                
                
$sql1= "SELECT `nombre` FROM `referencias2` WHERE id = '". $ref. "'";
$result1=mysqli_query($conexion,$sql1);       

     
                while($mostrar1=mysqli_fetch_array($result1)){
                    $referencia=$mostrar1['nombre'];
                   
            }
           
            
            // a partir del último dígito de la referencia calculo si es inferior o superior.
            
            $ultimoRef=substr($referencia, -1);
           
            
            if ($ultimoRef=="I"){
            
            $supInf="INF";
            }
            else if ($ultimoRef=="S"){
            
            $supInf="SUP";
            }
            else{
                
            }
            
            //a partir de la tabla referencias2 consulto si es muela entonces es pos, si es diente es ant
            
            $sqlr= "SELECT `tipo` FROM `referencias2` WHERE id = '". $ref. "'";
$resultr=mysqli_query($conexion,$sqlr);       

     
                while($mostrarr=mysqli_fetch_array($resultr)){
                    $tipo=$mostrarr['tipo'];
                   
            }
            
            
            
            if ($tipo=="Muela"){
            
            $antPos="POS";
            }
            else if ($tipo=="Diente"){
            
            $antPos="ANT";
            }
            else{
                
            }
            
            // busco el nombre de la color según su id, en la tabla colores2
                
                
$sql2= "SELECT `nombre` FROM `colores2` WHERE id = '". $color. "'";
$result2=mysqli_query($conexion,$sql2);       

     
                while($mostrar2=mysqli_fetch_array($result2)){
                    $colorin=$mostrar2['nombre'];
                   
            }

    //$juegos=$juegos*$cajas;
    
    $herramienta21 = new Herramienta();
$ingresar_datos_listaEmpaque = $herramienta21->ingresar_datos_listaEmpaque_digitandoLote($referencia, $antPos, $supInf, $colorin, $lote, $juegos, $cajas, $codigoQR, $pedido, $caja, $metodo);
    




?>