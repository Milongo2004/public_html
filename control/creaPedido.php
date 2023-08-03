<?php 
require_once("herramienta_introducir_datos.php");

$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");



$pedido=$_GET ["pedido"];
$cliente=$_GET ["cliente"];
$linea=$_GET ["linea"];
$vendedor=$_GET ["vendedor"];
$juegosTotales=$_GET ["juegosTotales"];
$nota=$_GET ["nota"];
$prioridad=$_GET ["prioridad"];

$sqlExisteCodigoPedido="SELECT idP FROM pedidos2 where codigoP='".$pedido."' LIMIT 1";

$resultExisteCodigoPedido=mysqli_query($conexion,$sqlExisteCodigoPedido);       

     
                while($mostrarExisteCodigoPedido=mysqli_fetch_array($resultExisteCodigoPedido)){
                    $existeCodigoPedido=$mostrarExisteCodigoPedido['idP'];
                   
            }
            
        if($existeCodigoPedido!='' || !(is_null($existeCodigoPedido))){
            echo "El codigo de pedido ya fue utilizado, por favor verifica";
        }
        else{


$herramienta15 = new Herramienta();
$ingresar_dato_tabla_pedidos2 = $herramienta15->ingresar_datos_tabla_pedidos2($pedido,$cliente, $linea, $vendedor, $juegosTotales,$nota,$prioridad);
}
?>