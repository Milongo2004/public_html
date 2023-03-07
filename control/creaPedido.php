<?php 
require_once("herramienta_introducir_datos.php");

$pedido=$_GET ["pedido"];
$cliente=$_GET ["cliente"];
$linea=$_GET ["linea"];
$vendedor=$_GET ["vendedor"];
$juegosTotales=$_GET ["juegosTotales"];
$nota=$_GET ["nota"];
$prioridad=$_GET ["prioridad"];

$herramienta15 = new Herramienta();
$ingresar_dato_tabla_pedidos2 = $herramienta15->ingresar_datos_tabla_pedidos2($pedido,$cliente, $linea, $vendedor, $juegosTotales,$nota,$prioridad);

?>