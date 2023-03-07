<?php 
require_once("herramienta_introducir_datos.php");
//$num_dato=$_GET ["numero_molde"];
$lote=$_GET ["lote"];
$colorId=$_GET ["color"];


$herramienta9 = new Herramienta();
$ingresar_dato_tabla_lotes2 = $herramienta9->ingresar_datos_tabla_lotes2($lote, $colorId);

?>