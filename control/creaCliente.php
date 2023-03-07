<?php 
require_once("herramienta_introducir_datos.php");

$nombreCliente=$_GET ["cliente"];
$nitCliente=$_GET ["nit"];


$herramienta16 = new Herramienta();
$ingresar_dato_tabla_clientes2 = $herramienta16->ingresar_datos_tabla_clientes2($nombreCliente,$nitCliente);

?>